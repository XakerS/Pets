<?php

namespace LostTeam\command;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pets\main;
use pocketmine\utils\TextFormat as TF;

class PetCommand extends PluginCommand {

	public function __construct(main $main, $name) {
		parent::__construct(
				$name, $main
		);
		$this->main = $main;
		$this->setPermission("pets.command");
		$this->setAliases(array("pet"));
	}

	public function execute(CommandSender $sender, $currentAlias, array $args) {
	
		if (!isset($args[0])) {
			if($sender->hasPermission('pets.command')){
				$this->main->togglePet($sender);
				return true;
			}
			else{
				$sender->sendMessage(TextFormat::RED."Для этой команды нужна привелегия!§6Подробнее тут:§a 1.sky-wars.ru");
				return true;
			}
		}
		switch (strtolower($args[0])){
			case "name":
				if (isset($args[1])){
					unset($args[0]);
					$name = implode(" ", $args);
					$this->main->getPet($sender->getName())->setNameTag($name);
					$sender->sendMessage("§Теперь твоего питомца зовут:§a".$name);
				}
				return true;
			break;
			
			case "list":
				if($sender->hasPermission('pets.command.list')){
				$sender->sendMessage("§e======§aСписок животных(типов)§e======");
				$sender->sendMessage("§e§ldog/wolf §aСобачка");
				$sender->sendMessage("§e§lblaze §aБлэйз");
				$sender->sendMessage("§e§lpig §aХрюшка");
				$sender->sendMessage("§e§lchicken §aКурочка");
				$sender->sendMessage("§e§lrabbit §aКролик");
				$sender->sendMessage("§e§lmagma §aМагмовый куб");
				$sender->sendMessage("§e§lbat §aЛетучая мышь");
				$sender->sendMessage("§e§lsilverfish §aРыбка");
				$sender->sendMessage("§e§lcat/ocelot §aКотик");
				$sender->sendMessage("§e§lslime §aСлайм");
				return true;
				}
				else{
				$sender->sendMessage("§4Для этой команды нужна привелегия!§6Подробнее тут:§a 1.sky-wars.ru");
				 }
				return true;
			break;
			
			case "help":
				if($sender->hasPermission('pet.command.help')){
				$sender->sendMessage("§e======§aПомощь§e======");
				$sender->sendMessage("§b/pets §aВключить/§4выключить ");
				$sender->sendMessage("§b/pets type [тип] §6изменить тип питомца");
				$sender->sendMessage("§b/pets name [новое имя] §6Сменить имя");
				$sender->sendMessage("§b/pets list §6Список (тип) животных");
				return true;
				}else{
					$sender->sendMessage(TextFormat::RED."Для этой команды нужна привелегия!§6Подробнее тут:§a 1.sky-wars.ru");
				}
					return true;
			break;
			
			case "type":
				if (isset($args[1])){
					switch ($args[1]){
						case "dog":
							if ($sender->hasPermission("pets.type.dog")){
								$this->main->changePet($sender, "WolfPet");
								$sender->sendMessage("§6Теперь твой питомец §a");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "chicken":
							if ($sender->hasPermission("pets.type.chicken")){
								$this->main->changePet($sender, "ChickenPet");
								$sender->sendMessage("§6Теперь твой питомец §aкурица");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "blaze":
							if ($sender->hasPermission("pets.type.blaze")){
								$this->main->changePet($sender, "BlazePet");
								$sender->sendMessage("§6Теперь твой питомец §aблейз");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав на этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						case "magma":
							if ($sender->hasPermission("pets.type.magma")){
								$this->main->changePet($sender, "MagmaPet");
								$sender->sendMessage("§6Теперь твой питомец §aмагмовый куб");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "rabbit":
							if ($sender->hasPermission("pets.type.rabbit")){
								$this->main->changePet($sender, "RabbitPet");
								$sender->sendMessage("Теперь твой питомец §aкролик");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "bat":
							if ($sender->hasPermission("pets.type.bat")){
								$this->main->changePet($sender, "BatPet");
								$sender->sendMessage("§6Теперь твой питомец §aлетучая мышь");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "pig":
							if ($sender->hasPermission("pets.type.pig")){
								$this->main->changePet($sender, "PigPet");
								$sender->sendMessage("§6Теперь твой питомец §aхрюшка");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "silverfish":
							if ($sender->hasPermission("pets.type.silerfish")){
								$this->main->changePet($sender, "SilverfishPet");
								$sender->sendMessage("§6Теперь твоя питомец §aрыбка");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "ocelot":
							if ($sender->hasPermission("pets.type.ocelot")){
								$this->main->changePet($sender, "OcelotPet");
								$sender->sendMessage("Теперь твой питомец §aкотик :3");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
						
						case "Slime":
							if ($sender->hasPermission("pets.type.slime")){
								$this->main->changePet($sender, "SlimePet");
								$sender->sendMessage("§6Теперь твой питомец §aслайм");
								return true;
							}else{
								$sender->sendMessage("§4У тебя нету прав для этого питомца!§6Купить их можно тут:§a1.sky-wars.ru");
								return true;
							}
						break;
					}
					
				}
				else{
					$sender->sendMessage("§b/pet type [тип]");
					$sender->sendMessage("§6Типы:§a ocelot, slime,blaze, pig, chicken, dog, rabbit, magma, bat, silverfish");
					return true;
					}
				return true;
			break;
		}
		
		return true;
	}

}

