<?php
include '_user.php';

$character = mysqli_real_escape_string($DB, $_GET['character']);

$query = 'SELECT user_character.id, user_character.name, class.name AS class, race.name AS race,
		stat_agi, stat_cha, stat_int, stat_lck, stat_sta, stat_str, stat_wis,
		bonus_save, bonus_attack, bonus_defence, bonus_initiative, size,
		level, hp, hp_dice
	FROM user_character, class, race
	WHERE user_character.id=' . $character . '
	AND user_character.class = class.id
	AND user_character.race = race.id
	ORDER BY user_character.name;';

$result = mysqli_query($DB, $query);
$row = mysqli_fetch_assoc($result);
//var_dump($row);
?>
<h1>Character: <?php echo $row['name']; ?></h1>
<a href="?page=user" class="btn btn-primary">Back</a>
<table class="table borderless">
	<tbody>
		<tr>
			<td class="col-md-4">
				<table class="table table-sm">
					<thead class="thead-inverse">
						<tr>
							<th colspan="3">
								Stats
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>AGI</td>
							<td><?php echo $row['stat_agi']; ?></td>
							<td><?php echo get_modifier($row['stat_agi']); ?></td>
						</tr>
						<tr>
							<td>CHA</td>
							<td><?php echo $row['stat_cha']; ?></td>
							<td><?php echo get_modifier($row['stat_cha']); ?></td>
						</tr>
						<tr>
							<td>INT</td>
							<td><?php echo $row['stat_int']; ?></td>
							<td><?php echo get_modifier($row['stat_int']); ?></td>
						</tr>
						<tr>
							<td>LCK</td>
							<td><?php echo $row['stat_lck']; ?></td>
							<td><?php echo get_modifier($row['stat_lck']); ?></td>
						</tr>
						<tr>
							<td>STA</td>
							<td><?php echo $row['stat_sta']; ?></td>
							<td><?php echo get_modifier($row['stat_sta']); ?></td>
						</tr>
						<tr>
							<td>STR</td>
							<td><?php echo $row['stat_str']; ?></td>
							<td><?php echo get_modifier($row['stat_str']); ?></td>
						</tr>
						<tr>
							<td>WIS</td>
							<td><?php echo $row['stat_wis']; ?></td>
							<td><?php echo get_modifier($row['stat_wis']); ?></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td class="col-md-4">
				<table class="table table-sm" style="height: 100%">
					<tbody>
						<tr>
							<td>
								<table class="table table-sm table-bordered">
									<thead class="thead-inverse">
										<tr>
											<th colspan="2">Level</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center"><?php echo $row['level']; ?></td>
											<td class="text-center">x</td>
										</tr>
										<tr>
											<td class="text-center">Lvl</td>
											<td class="text-center">XP</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<table class="table table-sm table-bordered">
									<thead class="thead-inverse">
										<tr>
											<th colspan="2">Health</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">d<?php echo $row['hp_dice']; ?></td>
											<td class="text-center"><?php echo $row['hp']; ?></td>
										</tr>
										<tr>
											<td class="text-center">HD</td>
											<td class="text-center">HP</td>
										</tr>
									</tbody>
								</table>
							</td>
						<tr>
							<td colspan="2">
								<table class="table table-sm">
									<thead class="thead-inverse">
										<tr>
											<th>Unique ability</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
										</td>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
			<td class="col-md-4">
				<table class="table table-sm" style="height: 100%">
					<thead class="thead-inverse">
						<tr>
							<th>Portrait</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
						</td>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table class="table table-sm table-hover">
					<thead class="thead-inverse">
						<tr>
							<th colspan="7">Skills</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Acrobatics</td>
							<td><?php echo get_modifier($row['stat_agi']); ?></td>
							<td>=</td>
							<td>AGI</td>
							<td><?php echo get_modifier($row['stat_agi']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Appearance</td>
							<td><?php echo get_modifier($row['stat_cha']); ?></td>
							<td>=</td>
							<td>CHA</td>
							<td><?php echo get_modifier($row['stat_cha']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Athletics</td>
							<td><?php echo get_modifier($row['stat_str']); ?></td>
							<td>=</td>
							<td>STR</td>
							<td><?php echo get_modifier($row['stat_str']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Chance</td>
							<td><?php echo get_modifier($row['stat_lck']); ?></td>
							<td>=</td>
							<td>LCK</td>
							<td><?php echo get_modifier($row['stat_lck']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Concentration</td>
							<td><?php echo get_modifier($row['stat_int']); ?></td>
							<td>=</td>
							<td>INT</td>
							<td><?php echo get_modifier($row['stat_int']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Conversation</td>
							<td><?php echo get_modifier($row['stat_cha']); ?></td>
							<td>=</td>
							<td>CHA</td>
							<td><?php echo get_modifier($row['stat_cha']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Dexterity</td>
							<td><?php echo get_modifier($row['stat_agi']); ?></td>
							<td>=</td>
							<td>AGI</td>
							<td><?php echo get_modifier($row['stat_agi']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Empathy</td>
							<td><?php echo get_modifier($row['stat_wis']); ?></td>
							<td>=</td>
							<td>WIS</td>
							<td><?php echo get_modifier($row['stat_wis']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Endurance</td>
							<td><?php echo get_modifier($row['stat_sta']); ?></td>
							<td>=</td>
							<td>STA</td>
							<td><?php echo get_modifier($row['stat_sta']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Gamble</td>
							<td><?php echo get_modifier($row['stat_lck']); ?></td>
							<td>=</td>
							<td>LCK</td>
							<td><?php echo get_modifier($row['stat_lck']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Grapple</td>
							<td><?php echo get_modifier($row['stat_str']); ?></td>
							<td>=</td>
							<td>STR</td>
							<td><?php echo get_modifier($row['stat_str']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Health</td>
							<td><?php echo get_modifier($row['stat_sta']); ?></td>
							<td>=</td>
							<td>STA</td>
							<td><?php echo get_modifier($row['stat_sta']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Intimidation</td>
							<td><?php echo get_modifier($row['stat_cha']); ?></td>
							<td>=</td>
							<td>CHA</td>
							<td><?php echo get_modifier($row['stat_cha']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Investigation</td>
							<td><?php echo get_modifier($row['stat_int']); ?></td>
							<td>=</td>
							<td>INT</td>
							<td><?php echo get_modifier($row['stat_int']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Knowledge</td>
							<td><?php echo get_modifier($row['stat_wis']); ?></td>
							<td>=</td>
							<td>WIS</td>
							<td><?php echo get_modifier($row['stat_wis']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Lift</td>
							<td><?php echo get_modifier($row['stat_str']); ?></td>
							<td>=</td>
							<td>STR</td>
							<td><?php echo get_modifier($row['stat_str']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Looting</td>
							<td><?php echo get_modifier($row['stat_lck']); ?></td>
							<td>=</td>
							<td>LCK</td>
							<td><?php echo get_modifier($row['stat_lck']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Magic</td>
							<td><?php echo get_modifier($row['stat_wis']); ?></td>
							<td>=</td>
							<td>WIS</td>
							<td><?php echo get_modifier($row['stat_wis']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Perception</td>
							<td><?php echo get_modifier($row['stat_int']); ?></td>
							<td>=</td>
							<td>INT</td>
							<td><?php echo get_modifier($row['stat_int']); ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Recovery</td>
							<td><?php echo get_modifier($row['stat_sta']) ?></td>
							<td>=</td>
							<td>STA</td>
							<td><?php echo get_modifier($row['stat_sta']) ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Stealth</td>
							<td><?php echo get_modifier($row['stat_agi']) ?></td>
							<td>=</td>
							<td>AGI</td>
							<td><?php echo get_modifier($row['stat_agi']) ?></td>
							<td>+</td>
							<td>0</td>
						</tr>
					</tbody>
				</table>
			</td>
			<td>
				<table class="table table-sm" style="height: 100%">
					<thead class="thead-inverse">
						<tr>
							<th>Abilities</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
						</td>
					</tbody>
				</table>
			</td>
			<td>
				<table class="table table-sm" style="height: 100%">
					<thead class="thead-inverse">
						<tr>
							<th colspan="20">Saves</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><?php
								echo floor((get_modifier($row['stat_agi']) + get_modifier($row['stat_int'])) / 2) + $row['bonus_save'];
							?></td>
							<td class="text-center">= (</td>
							<td class="text-center"><?php echo get_modifier($row['stat_agi']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo get_modifier($row['stat_int']); ?></td>
							<td class="text-center">) /2 +</td>
							<td class="text-center"><?php echo $row['bonus_save']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>Reflex</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>AGI</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>INT</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>

						<tr>
							<td class="text-center"><?php
								echo floor((get_modifier($row['stat_int']) + get_modifier($row['stat_wis'])) / 2) + $row['bonus_save'];
							?></td>
							<td class="text-center">= (</td>
							<td class="text-center"><?php echo get_modifier($row['stat_int']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo get_modifier($row['stat_wis']); ?></td>
							<td class="text-center">) /2 +</td>
							<td class="text-center"><?php echo $row['bonus_save']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>Will</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>INT</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>WIS</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-sm" style="height: 100%">
					<thead class="thead-inverse">
						<tr>
							<th colspan="20">Attack</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><?php
								echo floor((get_modifier($row['stat_str']) + 0) / 2) + $row['bonus_attack'];
							?></td>
							<td class="text-center">= (</td>
							<td class="text-center"><?php echo get_modifier($row['stat_str']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo '0'; ?></td>
							<td class="text-center">) /2 +</td>
							<td class="text-center"><?php echo $row['bonus_attack']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>Base</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>STR</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small><strike>Arobatics</strike></small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>

						<tr>
							<td class="text-center"><?php
								echo floor((get_modifier($row['stat_str']) + 0) / 2) + $row['bonus_attack'];
							?></td>
							<td class="text-center">= (</td>
							<td class="text-center"><?php echo get_modifier($row['stat_str']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo '0'; ?></td>
							<td class="text-center">) /2 +</td>
							<td class="text-center"><?php echo $row['bonus_attack']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>Ranged</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>STR</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small><strike>Dexterity</strike></small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>

						<tr>
							<td class="text-center"><?php
								echo floor((get_modifier($row['stat_wis']) + 0) / 2) + $row['bonus_attack'];
							?></td>
							<td class="text-center">= (</td>
							<td class="text-center"><?php echo get_modifier($row['stat_wis']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo '0'; ?></td>
							<td class="text-center">) /2 +</td>
							<td class="text-center"><?php echo $row['bonus_attack']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>Magic</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>WIS</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small><strike>Concentration</strike></small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-sm" style="height: 100%">
					<thead class="thead-inverse">
						<tr>
							<th colspan="20">Defence</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><?php
								echo floor((get_modifier($row['stat_sta']) + get_modifier($row['stat_wis'])) / 2) + $row['bonus_defence'];
							?></td>
							<td class="text-center">= (</td>
							<td class="text-center"><?php echo get_modifier($row['stat_sta']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo get_modifier($row['stat_wis']); ?></td>
							<td class="text-center">) /2 +</td>
							<td class="text-center"><?php echo $row['bonus_defence']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>SR</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>STA</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>WIS</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>

						<tr>
							<td class="text-center"><?php
								echo 10 + get_modifier($row['stat_sta']) + (1 - ($row['size'] - 1)) + $row['bonus_defence'];
							?></td>
							<td class="text-center">= 10 + </td>
							<td class="text-center"><?php echo get_modifier($row['stat_sta']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo 1 - ($row['size'] - 1); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo $row['bonus_defence']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>AC</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>STA</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Size</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table class="table table-sm">
					<thead class="thead-inverse">
						<tr>
							<th colspan="20">Languages</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>

							</td>
						</tr>
					</tbody>
				</table>
			</td>
			<td>
				<table class="table table-sm">
					<thead class="thead-inverse">
						<tr>
							<th colspan="20">Speed</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center">x</td>
							<td class="text-center">x</td>
							<td class="text-center">x</td>
							<td class="text-center">x</td>
							<td class="text-center">x</td>
						</tr>
						<tr>
							<td class="text-center"><small>Walk</small></td>
							<td class="text-center"><small>Run</small></td>
							<td class="text-center"><small>Swim</small></td>
							<td class="text-center"><small>Climb</small></td>
							<td class="text-center"><small>Fly</small></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td>
				<table class="table table-sm">
					<thead class="thead-inverse">
						<tr>
							<th colspan="20">Initiative</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><?php
								echo floor((get_modifier($row['stat_int']) + get_modifier($row['stat_wis'])) / 2) + $row['bonus_initiative'];
							?></td>
							<td class="text-center">= (</td>
							<td class="text-center"><?php echo get_modifier($row['stat_int']); ?></td>
							<td class="text-center">+</td>
							<td class="text-center"><?php echo get_modifier($row['stat_wis']); ?></td>
							<td class="text-center">) /2 +</td>
							<td class="text-center"><?php echo $row['bonus_initiative']; ?></td>
						</tr>
						<tr>
							<td class="text-center"><small>Total</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>INT</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>WIS</small></td>
							<td class="text-center"></td>
							<td class="text-center"><small>Bonus</small></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<a href="?page=user" class="btn btn-primary">Back</a>
