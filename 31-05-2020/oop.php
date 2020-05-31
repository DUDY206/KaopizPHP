<?php
class Book{
    var $price;
    var $title;

    public function __construct($price,$title)
    {
        $this->price = $price;
        $this->title = $title;
    }
    /**
     * @return mixed
     */public function getPrice()
    {
        return $this->price."<br>";
    }

    /**
     * @return mixed
     */public function getTitle()
    {
        return $this->title."<br>";
    }

    /**
     * @param mixed $price
     */public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @param mixed $title
     */public function setTitle($title)
    {
        $this->title = $title;
    }

    public function toString(){
         return $this->title.":".$this->price."<br>";
    }
}


$book1 = new Book("100","Hello world");
$book2 = new Book("200","Hello world1");
$book3 = new Book("300","Hello world2");
$book1->setTitle("Book1 title changed");


echo $book1->toString();
echo $book2->toString();
echo $book3->toString();

class Novel extends Book{
    var $publisher;

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher."<br>";
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }
}