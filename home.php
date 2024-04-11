<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Синтаксис PHP та обробка HTTP-запитів</h1>

<p></p>
<?php
class BananaColorClass
{
    // property declaration
    private $var = ['green banana','yellow banana','brown banana'];

    public $bananaBank = ['Peter' => 3, 'Anna' => 6, 'Jack' => 4];

    // method declaration
    public function displayVar() {
        return implode(" and ", $this->var);
    }
}

$a = new BananaColorClass();
echo $a->displayVar();


echo "<br>";
echo "<br>";


foreach ($a->bananaBank as $key => $value) {
    echo $key . " has " . $value . " bananas.";
    echo "<br>";
}

echo "<br>";

$b = explode(" and ", $a->displayVar());
echo "There are " . count($b) . " bananas.";

echo "<br>";
echo "<br>";

class Bananas
{
    public $numberOfBananas = 0;

    /**
     * @param int $numberOfBananas
     */
    public function __construct($numberOfBananas)
    {
        $this->numberOfBananas = $numberOfBananas;
    }

    public function numberOfBananasIHave(){
        return "I have $this->numberOfBananas bananas";
    }

    public function addBanana($numberOfBananas){
        $this->numberOfBananas += $numberOfBananas;
    }

    public function getBananasNumber(){
        return $this->numberOfBananas;
    }

}

class YellowBananas extends Bananas
{
   const  color = 'yellow';

    public static function bananaColor(){
        echo self::color;
    }

    public function __toString()
    {
        return $this->numberOfBananas. " " . self::color . " bananas" ;
    }

}

trait BananaBoom
{
    public function bananaBoom(){
        echo "Banana BOOOOOM!";
    }
}

class GreenBananas extends Bananas
{

    use BananaBoom;

    const color = 'green';

    public static function bananaColor(){
        echo self::color;
    }

    public function __toString()
    {
        return $this->numberOfBananas. " " . self::color . " bananas" ;
    }


}

class AllBananas{
    public $yellowBananas;
    public $greenBananas;

    public function __construct(YellowBananas $yellowBananas, GreenBananas $greenBananas){
        $this->yellowBananas = $yellowBananas;
        $this->greenBananas = $greenBananas;
    }

    public function allBananasIHave(){
        return "I have " . (($this->yellowBananas)->getBananasNumber() + ($this->greenBananas)->getBananasNumber()) . " bananas";
    }

}

$yellowBananas = new YellowBananas(4);

echo $yellowBananas->numberOfBananasIHave();

echo "<br>";
echo "<br>";

$greenBananas = new GreenBananas(5);
$bananas = new AllBananas($yellowBananas, $greenBananas);
echo $bananas->allBananasIHave();


echo "<br>";
echo "<br>";

function equalBanana($yellowBananas, $bananas){
    if($yellowBananas->getBananasNumber() === $bananas->yellowBananas->getBananasNumber()){
        echo $yellowBananas->getBananasNumber();
        echo "<br>";
        echo $bananas->yellowBananas->getBananasNumber();
        echo "<br>";
        echo "yellowBananas equal yellowBananas in bananas";
    } else{
        echo $yellowBananas->getBananasNumber();
        echo "<br>";
        echo $bananas->yellowBananas->getBananasNumber();
        echo "<br>";
        echo "yellowBananas arent equal yellowBananas in bananas";
    }
}

$yellowBananas_2 = new YellowBananas(4);

equalBanana($yellowBananas_2, $bananas);



echo "<br>";
echo "<br>";

$yellowBananas_2->addBanana(3);

equalBanana($yellowBananas_2, $bananas);


echo "<br>";
echo "<br>";

YellowBananas::bananaColor();
echo "<br>";
GreenBananas::bananaColor();


echo "<br>";
echo "<br>";

echo $yellowBananas;
echo "<br>";
echo $greenBananas;

echo "<br>";
echo "<br>";

interface BananaUse
{
    public static function useBananas(Bananas $bananas);

}

class EatBanana implements BananaUse
{

    public static function useBananas(Bananas $bananas)
    {
        $bananas->numberOfBananas -= 1;
        echo "I ate 1 banana";
    }
}

EatBanana::useBananas($yellowBananas);

echo "<br>";
echo "<br>";

echo $yellowBananas;

echo "<br>";
echo "<br>";

$greenBananas->bananaBoom();

echo "<br>";
echo "<br>";


class SingletonBananaPistol
{
    private static $instance = [];
    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        $cls = static::class;
        if (!isset(self::$instance[$cls])) {
            self::$instance[$cls] = new $cls();
        }
        return self::$instance[$cls];
    }
    public function shoot(){
        echo "BananaPistol is shooting. Be careful";
    }


}

$bananaPistol = SingletonBananaPistol::getInstance();
$bananaPistol2 = SingletonBananaPistol::getInstance();

if($bananaPistol === $bananaPistol2){
    echo "All bananaPistols are equal";
} else {
    echo "There is one bananaPistol imposter";
}


echo "<br>";
echo "<br>";

?>

<form method='get' action='./your_banana.php'>
    <label>Name your banana</label>
<input type="text" name="banana">
<input type="submit"><br>
</form>

<form method='post' action='banana_account.php'>
    <label>Your banana account name</label>
    <input type="text" name="banana_user_name"><br>
    <label>Your banana account password</label>
    <input type="text" name="password"><br>
    <input type="submit">
</form>


</body>
</html>
