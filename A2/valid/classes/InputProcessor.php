<?php

class InputProcessor {

    //EMAIL verification
    public static function process_email(string $email) : array {

        //Checks if emtty
        if (empty($email)) {
            return self::return_input(false, "Email field is empty.");
        }

        $value = htmlspecialchars($email);
        $value = filter_var($email, FILTER_VALIDATE_EMAIL);

        //returns error if provided email does not pass checks
        if ($value === false ) {
            return self::return_input(false, "$email is not valid a valid email address.");
        }

        return self::return_input(true, $value);

    }

    //PASSWORDS verification
    public static function process_password(string $password, string $passwordv = null, bool $updateNoPWChange = false) : array {

        //checks if both password are the same
        if(!$updateNoPWChange)
        {
            // Password validation
            if (empty($password)) 
            {
                return self::return_input(false, "Password field is empty.");
            }
            if (empty($passwordv) || ($password != $passwordv)) 
            {
                return self::return_input(false, "Passwords do not match.");
            }
            else 
            {
                return self::return_input(true, htmlspecialchars($password));;
            }
        }

        //Checks for speicla characters
        $value = htmlspecialchars($password);

        //must satisfy regect specification 
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        //error message if specifications not met
        //Checks if password matched to regex patter at least once
        if (preg_match($regex, $password) !== 1 ) {
            return self::return_input(false, "Password must have a minimum of 8 characters, at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character.");
        }

        return self::return_input(true, $value);

    }

    //TEXT verification
    public static function process_string(string $text, $length = 0) : array {

        //Checks if provided not not empty
        if (empty($text)) {
            return self::return_input(false, "Field is empty.");
        }
        
        //Check if lenght is more than 5
        if ($length > 5) {
            if (strlen($text) > $length) {
                return self::return_input(false, "Text must be less than $length characters.");
            }
        }

        //Checks if all characters are english cracters
        $regex = '/^[a-zA-Z]+([_ -]?[a-zA-Z])*$/';

        //Returns false if checks not satisfied
        if (preg_match($regex, $text) === false ) {
            return self::return_input(false, "Text must be A - z characters only.");
        }

        $value = htmlspecialchars($text);
        return self::return_input(true, $value);

    }

    //FILE verification
    public static function process_file(array $file) : array {

        //Checks if file is not empty
        if (empty($file) ) {
            return self::return_input(false, "File is empty.");
        }

        return self::return_input(true, $file['name']);

    }

    //returns provided data if it was valid
    private static function return_input(bool $valid, string $value) : array {

        return [
            'valid' => $valid, 
            'value' =>  $valid ? $value : '', 
            'error' =>  $valid ? '' : $value,
        ];

    }

}


?>