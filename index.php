<?php 

require_once('Food.php');
require_once('Character.php');
require_once('FighterInterface.php');
require_once('LeaderInterface.php');

class Emperor extends Character implements LeaderInterface {
	public function giveCommand(Character $character, $command){
		$character->executeCommand($command);
	}
}

class General extends Character implements LeaderInterface {
	public function giveCommand(Character $character, $command){
		if($character instanceof Emperor){
			echo "General: Nu puteti da comanda Imparatului!";
			return;
		}
		$character->executeCommand($command);	
	}
	
	public function executeCommand($command){
		echo "General: Execut comanda: " . $command;
	}
}

class RiderLeader extends Character implements LeaderInterface {
	public function giveCommand(Character $cavalery, $command){
		if(!($cavalery instanceof Cavalery)){
			echo "Conducatorul Calaretilor: Puteti da comenzi doar cavaleriei!";
			return;
		}
		$cavalery->executeCommand($command);		
	}
	
	public function executeCommand($command){
		echo "Conducatorul Calaretilor: Execut comanda: " . $command;
	}
}

class InfantryLeader extends Character implements LeaderInterface {
	public function giveCommand(Character $infantery, $command){
		if(!($cavalery instanceof Cavalery))
			return "Conducatorul Infanteriei: Puteti da comenzi doar infanteriei!";
		$character->executeCommand($command);
	}
	
	public function executeCommand($command){
		echo "Conducatorul Infanteriei: Execut comanda: " . $command;
	}
}

class Cavalery extends Character implements FighterInterface {
	public function executeCommand($command){
		echo "Cavaler: Execut comanda: " . $command;
	}
	
	public function atac(){
		$this->move("Cavaler: Inainte");
		$this->move("Cavaler: Inainte");
		$this->move("Cavaler: Inainte");
		echo "Cavaler: ATAC";
	}
	
	public function withdrawal(){
		$this->move("Cavaler: Inapoi");
	}
}

class Infantery extends Character implements FighterInterface {
	public function executeCommand($command){
		echo "Infanterie: Execut comanda: " . $command;
	}
}

class Warrior extends Infantery {
	public function executeCommand($command){
		echo "Luptator: Execut comanda: " . $command;
	}
	
	public function moveForward(){
		$this->move("Luptator: Inainte");
	}
		
	public function moveBack(){
		$this->move("Luptator: Inapoi");
	}
	
	public function attac(){
		$this->moveForward();
		$this->moveForward();
		$this->moveForward();
		echo "Luptator: ATAC";
	}
}

class Archer extends Infantery {
	public function executeCommand($command){
		echo "Arcas: Execut comanda: " . $command;
	}
	
	public function fire(){
		echo "Arcas: Impusc din arcuri<br>";
	}
		
	public function moveForward(){
		$this->move("Arcas: Inainte");
	}
		
	public function moveBack(){
		$this->move("Arcas: Inapoi");
	}
}

$archer = new Cavalery();
$infantery = new Infantery();
$general = new General();
$emperor = new Emperor();
$riderLeader = new RiderLeader();

// $riderLeader->eat(); //output: Eat food
// $emperor->giveCommand($archer, "FOOOOC"); //output: Cavaler: Execut comanda: FOOOOC

// $general->giveCommand($emperor, "Impusca"); //output: Nu puteti da comanda Imparatului!
// $riderLeader->giveCommand($infantery, "Impusca"); //output: Puteti da comenzi doar cavaleriei!








