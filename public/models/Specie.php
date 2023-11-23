<?php
class Specie{
    private int $id;
    private string $name;
    private string $climate;
    private string $region;
    private int $growth_time_days;
    private string $benefits;
    private string $image;
    private string $link;
    public function __construct(int $id, string $name, string $climate,string $region, int $growth_time_days
    ,string $benefits, string $image, string $link)
    {
        $this->id=$id;
        $this->name=$name;
        $this->climate=$climate;
        $this->region=$region;
        $this->growth_time_days=$growth_time_days;
        $this->benefits=$benefits;
        $this->image=$image;
        $this->link=$link;
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