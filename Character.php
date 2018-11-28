<?php 

abstract class Character {
	public function move($direction=""){
		echo "Move " . $direction . "<br>";
	}
	public function eat(){
		Food::eat();
	}
}