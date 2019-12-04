<?php

class User extends DatabaseObject{
    static protected $table_name = 'user';
    static protected $db_columns = ['id', 'user_name', 'email_add', 'hashed_password', 'phone_number'];

    public $id;
    public $user_name;
    public $email_add;
    protected $hashed_password;
    public $password;
    public $confirm_password;
    protected $password_required = true;
    public $phone_number;


    public function __construct($args=[]) {
        $this->id = $args['id'] ?? '';
        $this->user_name = $args['user_name'] ?? '';
        $this->email_add = $args['email_add'] ?? '';
        $this->hashed_password = $args['hashed_password'] ?? '';
        $this->phone_number = $args['phone_number'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';

    }

    protected function set_hashed_password() {
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function verify_password($password) {
        return password_verify($password, $this->hashed_password);
    }

    protected function create() {
        $this->set_hashed_password();
        return parent::create();
    }

    protected function update() {
        if($this->password != '') {
            $this->set_hashed_password();
            // validate password
        } else {
            // password not being updated, skip hashing and validation
            $this->password_required = false;
        }
        return parent::update();
    }


    protected function validate() {
        $this->errors = [];

        if(is_blank($this->user_name)) {
            $this->errors[] = "User name cannot be blank.";
        }

        if(is_blank($this->phone_number)) {
            $this->errors[] = "Phone number cannot be blank.";
        }

        if(is_blank($this->email_add)) {
            $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->email_add, array('max' => 255))) {
            $this->errors[] = "Last name must be less than 255 characters.";
        } elseif (!has_valid_email_format($this->email_add)) {
            $this->errors[] = "Email must be a valid format.";
        } elseif (!has_unique_email($this->email_add, $this->id ?? 0)) {
            $this->errors[] = "Email already exists.";
        }

        if(is_blank($this->hashed_password)) {
            $this->errors[] = "Password cannot be blank.";
        }

        if($this->password_required) {
            if(is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank.";
            } elseif (!has_length($this->password, array('min' => 6))) {
                $this->errors[] = "Password must contain 12 or more characters";
            } elseif (!preg_match('/[A-Z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 symbol";
            }

            if(is_blank($this->confirm_password)) {
                $this->errors[] = "Confirm password cannot be blank.";
            } elseif ($this->password !== $this->confirm_password) {
                $this->errors[] = "Password and confirm password must match.";
            }
        }

        return $this->errors;
    }

    static public function find_by_email($email) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE email_add='" . self::$database->escape_string($email) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    public function get_all_events_participated(){
        $sql = "SELECT DISTINCT charity_event.* FROM charity_event, participant WHERE charity_event.id = participant.eid AND participant.uid=".$this->id."'";
        return CharityEvent::find_by_sql($sql);
    }

    public function get_all_events_created(){
        $sql = "SELECT DISTINCT * FROM charity_event WHERE organiser_id='".$this->id."'";
        return CharityEvent::find_by_sql($sql);
    }
    
    static public function find_by_username($username) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE user_name='" . self::$database->escape_string($username) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

}

?>
