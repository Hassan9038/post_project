<?php 
class Auth
{
    public static function authenticate($row)
    {
        $_SESSION['USER'] = $row;
    }
    
    public static function logout()
    {
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
    }

    public static function logged_in()
    {
        if (isset($_SESSION['USER'])) {
            return true;
        }
        return false;
    }

    public static function user()
    {
        if (isset($_SESSION['USER'])) {
            return $_SESSION['USER']->firstname;
        }
        return false;
    }

    public static function __callStatic($method , $params){

        $prop = strtolower(str_replace("get" , "" , $method));
        if (isset($_SESSION['USER']->$prop)) {
            return $_SESSION['USER']->$prop;
        }
        return "Unknown";

    }


     public static function switch_school($id)
    {
        if (isset($_SESSION['USER']) && $_SESSION['USER']->rank == 'super_admin') {

            $user = new User();
            $school = new School();

            
            if ($row = $school->where('id', $id)) {

                $row = $row[0];
                $arr['school_id'] = $row->school_id;

                $user->update($_SESSION['USER']->id , $arr);

                $_SESSION['USER']->school_id = $row->school_id;
                $_SESSION['USER']->school_name = $row->school;
                
            }
            return true;
        }
        return false;
    }
    
    // Access file
    public static function access($rank  = "student")
    {
        if (!isset($_SESSION['USER'])) {
            return false;
        }

        // current user rank
        $logged_in_rank = $_SESSION['USER']->rank;

        $RANK['super_admin'] = ['super_admin' , 'admin' , 'lecturer' , 'reception' , 'student'];
        $RANK['admin']       = ['admin' , 'lecturer' , 'reception' , 'student'];
        $RANK['lecturer']    = [ 'lecturer' , 'reception' , 'student'];
        $RANK['reception']   = ['reception' , 'student'];
        $RANK['student']     = ['student'];

        if (!isset($RANK[$logged_in_rank])) {
            // code...
            return false;
        }

        if (in_array($rank, $RANK[$logged_in_rank])) {
            // code...
            return true;
        }


        return false;
    }


    public static function i_own_content($row)
    {
        // code...
        if (!isset($_SESSION['USER'])) {
            
            return false;
        }

        if (isset($row->user_id)) {

            if ($_SESSION['USER']->user_id == $row->user_id) {
                // code...
                return true;
            }
        }

        $allowed[] = 'super_admin';
        $allowed[] = 'admin';
     
        if (in_array($_SESSION['USER']->rank , $allowed)) {
            // code...
            return true;
        }

        return false;
    }

    
}