// its a demo code 

<?php
// its a demo code 
// its a demo code 
// its a demo code 
// its a demo code
// its a demo code 
// its a demo code 
// its a demo code 


use Illuminate\Http\Request;



class User
{
    public $id;
    public $name;
    public $email;
    public $age;

    public function __construct($id, $name, $email, $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
    }

    public function display()
    {
        echo "ID: {$this->id}\n";
        echo "Name: {$this->name}\n";
        echo "Email: {$this->email}\n";
        echo "Age: {$this->age}\n";
        echo "--------------------------\n";
    }
}

class UserManager
{
    public $users = [];

    public function generateId()
    {
        return count($this->users) + 1;
    }

    public function addUser($name, $email, $age)
    {
        $id = $this->generateId();
        $user = new User($id, $name, $email, $age);
        $this->users[$id] = $user;
        echo "User added successfully!\n";
    }

    public function getUser($id)
    {
        if (isset($this->users[$id])) {
            return $this->users[$id];
        }
        return null;
    }

    public function updateUser($id, $name, $email, $age)
    {
        if (isset($this->users[$id])) {
            $this->users[$id]->name = $name;
            $this->users[$id]->email = $email;
            $this->users[$id]->age = $age;
            echo "User updated successfully!\n";
        } else {
            echo "User not found!\n";
        }
    }

    public function deleteUser($id)
    {
        if (isset($this->users[$id])) {
            unset($this->users[$id]);
            echo "User deleted successfully!\n";
        } else {
            echo "User not found!\n";
        }
    }

    public function listUsers()
    {
        if (empty($this->users)) {
            echo "No users found.\n";
            return;
        }

        foreach ($this->users as $user) {
            $user->display();
        }
    }

    public function searchUserByName($name)
    {
        $found = false;
        foreach ($this->users as $user) {
            if (stripos($user->name, $name) !== false) {
                $user->display();
                $found = true;
            }
        }

        if (!$found) {
            echo "No matching users found.\n";
        }
    }
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateAge($age)
{
    return is_numeric($age) && $age > 0 && $age < 120;
}

function showMenu()
{
    echo "\n===== USER MANAGEMENT SYSTEM =====\n";
    echo "1. Add User\n";
    echo "2. View User\n";
    echo "3. Update User\n";
    echo "4. Delete User\n";
    echo "5. List All Users\n";
    echo "6. Search User By Name\n";
    echo "7. Exit\n";
    echo "Choose an option: ";
}

$manager = new UserManager();

while (true) {

    showMenu();
    $choice = trim(fgets(STDIN));

    if ($choice == 1) {

        echo "Enter name: ";
        $name = trim(fgets(STDIN));

        echo "Enter email: ";
        $email = trim(fgets(STDIN));

        if (!validateEmail($email)) {
            echo "Invalid email format!\n";
            continue;
        }

        echo "Enter age: ";
        $age = trim(fgets(STDIN));

        if (!validateAge($age)) {
            echo "Invalid age!\n";
            continue;
        }

        $manager->addUser($name, $email, $age);

    } elseif ($choice == 2) {

        echo "Enter user ID: ";
        $id = trim(fgets(STDIN));
        $user = $manager->getUser($id);

        if ($user) {
            $user->display();
        } else {
            echo "User not found!\n";
        }

    } elseif ($choice == 3) {

        echo "Enter user ID to update: ";
        $id = trim(fgets(STDIN));

        echo "Enter new name: ";
        $name = trim(fgets(STDIN));

        echo "Enter new email: ";
        $email = trim(fgets(STDIN));

        if (!validateEmail($email)) {
            echo "Invalid email format!\n";
            continue;
        }

        echo "Enter new age: ";
        $age = trim(fgets(STDIN));

        if (!validateAge($age)) {
            echo "Invalid age!\n";
            continue;
        }

        $manager->updateUser($id, $name, $email, $age);

    } elseif ($choice == 4) {

        echo "Enter user ID to delete: ";
        $id = trim(fgets(STDIN));
        $manager->deleteUser($id);

    } elseif ($choice == 5) {

        $manager->listUsers();

    } elseif ($choice == 6) {

        echo "Enter name to search: ";
        $name = trim(fgets(STDIN));
        $manager->searchUserByName($name);

    } elseif ($choice == 7) {

        echo "Exiting program...\n";
        break;

    } else {

        echo "Invalid option! Try again.\n";
    }
}

