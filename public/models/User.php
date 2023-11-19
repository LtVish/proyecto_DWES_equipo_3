<?php
class User{
    private int $id;
    private string $nick;
    private string $email;
    private string $full_name;
    private int $karma;

    public function __construct(int $id, string $nick,string $email,string $full_name,int $karma)
    {
        $this->id=$id;
        $this->nick=$nick;
        $this->email=$email;
        $this->full_name=$full_name;
        $this->karma=$karma;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__,$name)) {
            return $this->{$name};
        }
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }
}
?>