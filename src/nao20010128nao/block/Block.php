<?php

/*
 *
 *  _                       _           _ __  __ _             
 * (_)                     (_)         | |  \/  (_)            
 *  _ _ __ ___   __ _  __ _ _  ___ __ _| | \  / |_ _ __   ___  
 * | | '_ ` _ \ / _` |/ _` | |/ __/ _` | | |\/| | | '_ \ / _ \ 
 * | | | | | | | (_| | (_| | | (_| (_| | | |  | | | | | |  __/ 
 * |_|_| |_| |_|\__,_|\__, |_|\___\__,_|_|_|  |_|_|_| |_|\___| 
 *                     __/ |                                   
 *                    |___/                                                                     
 * 
 * This program is a third party build by ImagicalMine.
 * 
 * PocketMine is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author ImagicalMine Team
 * @link http://forums.imagicalcorp.ml/
 * 
 *
*/

/**
 * All Block classes are in here
 */
namespace nao20010128nao\block;

use pocketmine\entity\Entity;


use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\level\Level;
use pocketmine\level\MovingObjectPosition;
use pocketmine\level\Position;
use pocketmine\math\AxisAlignedBB;
use pocketmine\math\Vector3;
use pocketmine\metadata\Metadatable;
use pocketmine\metadata\MetadataValue;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\nbt\tag\Int;


class Block extends \pocketmine\block\Block{
	const AIR = 0;
	const STONE = 1;
	const GRASS = 2;
	const DIRT = 3;
	const COBBLESTONE = 4;
	const COBBLE = 4;
	const PLANK = 5;
	const PLANKS = 5;
	const WOODEN_PLANK = 5;
	const WOODEN_PLANKS = 5;
	const SAPLING = 6;
	const SAPLINGS = 6;
	const BEDROCK = 7;
	const WATER = 8;
	const STILL_WATER = 9;
	const LAVA = 10;
	const STILL_LAVA = 11;
	const SAND = 12;
	const GRAVEL = 13;
	
	const GOLD_ORE = 14;
	const IRON_ORE = 15;
	const COAL_ORE = 16;
	const LOG = 17;
	
	const WOOD = 17;
	const TRUNK = 17;
	const LEAVES = 18;
	const LEAVE = 18;
	const SPONGE = 19;
	const GLASS = 20;
	const LAPIS_ORE = 21;
	const LAPIS_BLOCK = 22;
	
	const DISPENSER = 23;

	const SANDSTONE = 24;
	
	const NOTEBLOCK = 25;

	const BED_BLOCK = 26;
	
	const POWERED_RAIL = 27;
	const DETECTOR_RAIL = 28;
	//const STICKY_PISTON = 27;


	const COBWEB = 30;
	const TALL_GRASS = 31;
	const BUSH = 32;
	const DEAD_BUSH = 32;
	const PISTON = 33;
	const PISTON_HEAD = 34;
	const WOOL = 35;
	const PISTON_EXTENSION = 35;
	const DANDELION = 37;
	const POPPY = 38;
	const ROSE = 38;
	const RED_FLOWER = 38;
	const BROWN_MUSHROOM = 39;
	const RED_MUSHROOM = 40;
	const GOLD_BLOCK = 41;
	const IRON_BLOCK = 42;
	const DOUBLE_SLAB = 43;
	const DOUBLE_SLABS = 43;
	const SLAB = 44;
	const SLABS = 44;
	const BRICKS = 45;
	const BRICKS_BLOCK = 45;
	const TNT = 46;
	const BOOKSHELF = 47;
	const MOSS_STONE = 48;
	const MOSSY_STONE = 48;
	const OBSIDIAN = 49;
	const TORCH = 50;
	const FIRE = 51;
	const MONSTER_SPAWNER = 52;
	const WOOD_STAIRS = 53;
	const WOODEN_STAIRS = 53;
	const OAK_WOOD_STAIRS = 53;
	const OAK_WOODEN_STAIRS = 53;
	const CHEST = 54;
	
	const REDSTONE_WIRE = 55;

	const DIAMOND_ORE = 56;
	const DIAMOND_BLOCK = 57;
	const CRAFTING_TABLE = 58;
	const WORKBENCH = 58;
	const WHEAT_BLOCK = 59;
	const FARMLAND = 60;
	const FURNACE = 61;
	const BURNING_FURNACE = 62;
	const LIT_FURNACE = 62;
	const SIGN_POST = 63;
	const DOOR_BLOCK = 64;
	const OAK_DOOR_BLOCK = 64;
	const WOOD_DOOR_BLOCK = 64;
	const LADDER = 65;
	const RAIL = 66;

	const COBBLE_STAIRS = 67;
	const COBBLESTONE_STAIRS = 67;
	const WALL_SIGN = 68;
	
	const LEVER = 69;
	const STONE_PRESSURE_PLATE = 70;
	const IRON_DOOR_BLOCK = 71;
	const WOODEN_PRESSURE_PLATE = 72;
	const REDSTONE_ORE = 73;
	const GLOWING_REDSTONE_ORE = 74;
	const LIT_REDSTONE_ORE = 74;
	const UNLIT_REDSTONE_TORCH = 75;
	const LIT_REDSTONE_TORCH = 76;
	const REDSTONE_TORCH = 76;
	const STONE_BUTTON = 77;

	const SNOW = 78;
	const SNOW_LAYER = 78;
	const ICE = 79;
	const SNOW_BLOCK = 80;
	const CACTUS = 81;
	const CLAY_BLOCK = 82;
	const REEDS = 83;
	const SUGARCANE_BLOCK = 83;
	
	const JUKEBOX = 83;

	const FENCE = 85;
	const PUMPKIN = 86;
	const NETHERRACK = 87;
	const SOUL_SAND = 88;
	const GLOWSTONE = 89;
	const GLOWSTONE_BLOCK = 89;
	
	const NETHER_PORTAL = 90;
	const PORTAL = 90;

	const LIT_PUMPKIN = 91;
	const JACK_O_LANTERN = 91;
	const CAKE_BLOCK = 92;
	
	const UNPOWERED_REPEATER = 93;
	const POWERED_REPEATER = 94;
	
	const STAINED_GLASS = 95; //INVISIBLE BEDROCK ID

	const TRAPDOOR = 96;
	
	const MONSTER_EGG = 97;

	const STONE_BRICKS = 98;
	const STONE_BRICK = 98;
	
	const BROWN_MUSHROOM_BLOCK = 99;
	const RED_MUSHROOM_BLOCK = 100;

	const IRON_BAR = 101;
	const IRON_BARS = 101;
	const GLASS_PANE = 102;
	const GLASS_PANEL = 102;
	const MELON_BLOCK = 103;
	const PUMPKIN_STEM = 104;
	const MELON_STEM = 105;
	const VINE = 106;
	const VINES = 106;
	const FENCE_GATE = 107;
	const BRICK_STAIRS = 108;
	const STONE_BRICK_STAIRS = 109;
	const MYCELIUM = 110;
	const WATER_LILY = 111;
	const LILY_PAD = 111;
	const NETHER_BRICKS = 112;
	const NETHER_BRICK_BLOCK = 112;
	const NETHER_BRICK_FENCE = 113;
	const NETHER_BRICKS_STAIRS = 114;
	const NETHER_WART_BLOCK = 115;

	const ENCHANTING_TABLE = 116;
	const ENCHANT_TABLE = 116;
	const ENCHANTMENT_TABLE = 116;
	const BREWING_STAND_BLOCK = 117;
	
	const CAULDRON = 118;
	const END_PORTAL = 119;

	const END_PORTAL_FRAME = 120;
	const END_STONE = 121;
	const DRAGON_EGG = 122;
	
	const REDSTONE_LAMP = 123;
	const LIT_REDSTONE_LAMP = 124;
	
	//const DOUBLE_WOODEN_SLAB = 125;
	//const WOODEN_SLAB = 126;
	const ACTIVATOR_RAIL = 126;
	
	const COCOA = 127;
	const COCOA_BEANS = 127;

	const SANDSTONE_STAIRS = 128;
	const EMERALD_ORE = 129;
	
	const ENDERCHEST = 130;
	
	const TRIPWIRE_HOOK = 131;
	const TRIPWIRE = 132;

	const EMERALD_BLOCK = 133;
	const SPRUCE_WOOD_STAIRS = 134;
	const SPRUCE_WOODEN_STAIRS = 134;
	const BIRCH_WOOD_STAIRS = 135;
	const BIRCH_WOODEN_STAIRS = 135;
	const JUNGLE_WOOD_STAIRS = 136;
	const JUNGLE_WOODEN_STAIRS = 136;
	
	const COMMAND_BLOCK = 136;
	const BEACON = 136;

	const COBBLE_WALL = 139;
	const STONE_WALL = 139;
	const COBBLESTONE_WALL = 139;
	
	const FLOWER_POT_BLOCK = 140;
	const CARROT_BLOCK = 141;
	const POTATO_BLOCK = 142;

	const WOODEN_BUTTON = 143;
	
	const SKULL_BLOCK = 144;
	const HEAD_BLOCK = 144;
	const MOB_HEAD_BLOCK = 144;

	const ANVIL_BLOCK = 145;
	const TRAPPED_CHEST = 146;
	const LIGHT_WEIGHTED_PRESSURE_PLATE = 147;
	const HEAVY_WEIGHTED_PRESSURE_PLATE = 148;
	const UNPOWERED_COMPARATOR = 149;
	const POWERED_COMPARATOR = 150;
	const DAYLIGHT_DETECTOR = 151;

	const REDSTONE_BLOCK = 152;
	
	const NETHER_QUARTZ_ORE = 153;
	const QUARTZ_ORE = 153;
	
	const HOPPER = 154;
	
	const QUARTZ_BLOCK = 155;
	const QUARTZ_STAIRS = 156;
	const DOUBLE_WOOD_SLAB = 157;
	const DOUBLE_WOODEN_SLAB = 157;
	const DOUBLE_WOOD_SLABS = 157;
	const DOUBLE_WOODEN_SLABS = 157;
	const WOOD_SLAB = 158;
	const WOODEN_SLAB = 158;
	const WOOD_SLABS = 158;
	const WOODEN_SLABS = 158;
	const STAINED_CLAY = 159;
	const STAINED_HARDENED_CLAY = 159;
	
	const STAINED_GLASS_PANE = 160;

	const LEAVES2 = 161;
	const LEAVE2 = 161;
	const WOOD2 = 162;
	const TRUNK2 = 162;
	const LOG2 = 162;
	const ACACIA_WOOD_STAIRS = 163;
	const ACACIA_WOODEN_STAIRS = 163;
	const DARK_OAK_WOOD_STAIRS = 164;
	const DARK_OAK_WOODEN_STAIRS = 164;
	
	const SLIME_BLOCK = 165;
	const SLIMEBLOCK = 165;
	const BARRIER = 166;
	const IRON_TRAPDOOR = 167;
	const PRISMARINE = 168;
	const SEA_LANTERN = 169;

	const HAY_BALE = 170;
	const CARPET = 171;
	const HARDENED_CLAY = 172;
	const COAL_BLOCK = 173;
	const PACKED_ICE = 174;

	const DOUBLE_PLANT = 175;
	const STANDING_BANNER = 176;
	const WALL_BANNER = 177;
	
	const DAYLIGHT_DETECTOR_INVERTED = 178;
	
	const RED_SANDSTONE = 179;
	const RED_SANDSTONE_STAIRS = 180;
	const DOUBLE_STONE_SLAB2 = 181;
	const STONE_SLAB2 = 182;

	const FENCE_GATE_SPRUCE = 183;
	const FENCE_GATE_BIRCH = 184;
	const FENCE_GATE_JUNGLE = 185;
	const FENCE_GATE_DARK_OAK = 186;
	const FENCE_GATE_ACACIA = 187;
	
	const SPRUCE_DOOR_BLOCK = 193;
	const BIRCH_DOOR_BLOCK = 194;
	const JUNGLE_DOOR_BLOCK = 195;
	const ACACIA_DOOR_BLOCK = 196;
	const DARK_OAK_DOOR_BLOCK = 197;

	const GRASS_PATH = 198;

	const PODZOL = 243;
	const BEETROOT_BLOCK = 244;
	const STONECUTTER = 245;
	const GLOWING_OBSIDIAN = 246;
	const NETHER_REACTOR = 247;
	const RESERVED = 255;

	const REDSTONEDELAY = 1;
	
	public static function init(){
		if(self::$list === null){
/***************************************************************************************************\
|------------------------------->>>> Location of // is important!! <<<<-----------------------------|
|			// <-- this level of indentation means that it is not yet in pocketmine     |
|		// <-- This level of indentation means the class is not yet made                    |
|------------------------------->>>> Location of // is important!! <<<<-----------------------------|
\***************************************************************************************************/
			self::$list[self::AIR] = Air::class;
			self::$list[self::STONE] = Stone::class;
			self::$list[self::GRASS] = Grass::class;
			self::$list[self::DIRT] = Dirt::class;
			self::$list[self::COBBLESTONE] = Cobblestone::class;
			self::$list[self::PLANKS] = Planks::class;
			self::$list[self::SAPLING] = Sapling::class;
			self::$list[self::BEDROCK] = Bedrock::class;
			self::$list[self::WATER] = Water::class;
			self::$list[self::STILL_WATER] = StillWater::class;
			self::$list[self::LAVA] = Lava::class;
			self::$list[self::STILL_LAVA] = StillLava::class;
			self::$list[self::SAND] = Sand::class;
			self::$list[self::GRAVEL] = Gravel::class;
			self::$list[self::GOLD_ORE] = GoldOre::class;
			self::$list[self::IRON_ORE] = IronOre::class;
			self::$list[self::COAL_ORE] = CoalOre::class;
			self::$list[self::WOOD] = Wood::class;
			self::$list[self::LEAVES] = Leaves::class;
			self::$list[self::SPONGE] = Sponge::class;
			self::$list[self::GLASS] = Glass::class;
			self::$list[self::LAPIS_ORE] = LapisOre::class;
			self::$list[self::LAPIS_BLOCK] = Lapis::class;
			//self::$list[self::DISPENSER] = Dispenser::class;
			self::$list[self::SANDSTONE] = Sandstone::class;
			self::$list[self::NOTEBLOCK] = Noteblock::class;
			self::$list[self::BED_BLOCK] = Bed::class;
			self::$list[self::POWERED_RAIL] = PoweredRail::class;
			self::$list[self::DETECTOR_RAIL] = DetectorRail::class;
			self::$list[self::ACTIVATOR_RAIL] = ActivatorRail::class;
			//self::$list[self::STICKY_PISTON] = StickyPiston::class;
			self::$list[self::COBWEB] = Cobweb::class;
			self::$list[self::TALL_GRASS] = TallGrass::class;
			self::$list[self::DEAD_BUSH] = DeadBush::class;
			//self::$list[self::PISTON] = Piston::class;
			//self::$list[self::PISTON_HEAD] = PistonHead::class;
			self::$list[self::WOOL] = Wool::class;
			//self::$list[self::PISTON_EXTENSION] = PistonExtension::class;
			self::$list[self::DANDELION] = Dandelion::class;
			self::$list[self::RED_FLOWER] = Flower::class;
			self::$list[self::BROWN_MUSHROOM] = BrownMushroom::class;
			self::$list[self::RED_MUSHROOM] = RedMushroom::class;
			self::$list[self::GOLD_BLOCK] = Gold::class;
			self::$list[self::IRON_BLOCK] = Iron::class;
			self::$list[self::DOUBLE_SLAB] = DoubleSlab::class;
			self::$list[self::SLAB] = Slab::class;
			self::$list[self::BRICKS_BLOCK] = Bricks::class;
			self::$list[self::TNT] = TNT::class;
			self::$list[self::BOOKSHELF] = Bookshelf::class;
			self::$list[self::MOSS_STONE] = MossStone::class;
			self::$list[self::OBSIDIAN] = Obsidian::class;
			self::$list[self::TORCH] = Torch::class;
			self::$list[self::FIRE] = Fire::class;
			self::$list[self::MONSTER_SPAWNER] = MonsterSpawner::class;
			self::$list[self::WOOD_STAIRS] = WoodStairs::class;
			self::$list[self::CHEST] = Chest::class;
			self::$list[self::REDSTONE_WIRE] = RedstoneWire::class;

			self::$list[self::DIAMOND_ORE] = DiamondOre::class;
			self::$list[self::DIAMOND_BLOCK] = Diamond::class;
			self::$list[self::WORKBENCH] = Workbench::class;
			self::$list[self::WHEAT_BLOCK] = Wheat::class;
			self::$list[self::FARMLAND] = Farmland::class;
			self::$list[self::FURNACE] = Furnace::class;
			self::$list[self::BURNING_FURNACE] = BurningFurnace::class;
			self::$list[self::SIGN_POST] = SignPost::class;
			self::$list[self::OAK_DOOR_BLOCK] = OakDoor::class;
			self::$list[self::LADDER] = Ladder::class;
			self::$list[self::RAIL] = Rail::class;

			self::$list[self::COBBLESTONE_STAIRS] = CobblestoneStairs::class;
			self::$list[self::WALL_SIGN] = WallSign::class;
			self::$list[self::LEVER] = Lever::class;
			self::$list[self::STONE_PRESSURE_PLATE] = StonePressurePlate::class;
			self::$list[self::WOODEN_PRESSURE_PLATE] = WoodenPressurePlate::class;

			self::$list[self::IRON_DOOR_BLOCK] = IronDoor::class;
			self::$list[self::REDSTONE_ORE] = RedstoneOre::class;
			self::$list[self::GLOWING_REDSTONE_ORE] = GlowingRedstoneOre::class;
			self::$list[self::UNLIT_REDSTONE_TORCH] = UnlitRedstoneTorch::class;
			self::$list[self::LIT_REDSTONE_TORCH] = LitRedstoneTorch::class;
			self::$list[self::STONE_BUTTON] = StoneButton::class;

			self::$list[self::SNOW_LAYER] = SnowLayer::class;
			self::$list[self::ICE] = Ice::class;
			self::$list[self::SNOW_BLOCK] = Snow::class;
			self::$list[self::CACTUS] = Cactus::class;
			self::$list[self::CLAY_BLOCK] = Clay::class;
			self::$list[self::SUGARCANE_BLOCK] = Sugarcane::class;
			//self::$list[self::JUKEBOX] = JukeBox::class;

			self::$list[self::FENCE] = Fence::class;
			self::$list[self::PUMPKIN] = Pumpkin::class;
			self::$list[self::NETHERRACK] = Netherrack::class;
			self::$list[self::SOUL_SAND] = SoulSand::class;
			self::$list[self::GLOWSTONE_BLOCK] = Glowstone::class;
			
			self::$list[self::NETHER_PORTAL] = NetherPortal::class;

			self::$list[self::LIT_PUMPKIN] = LitPumpkin::class;
			self::$list[self::CAKE_BLOCK] = Cake::class;
			//self::$list[self::UNPOWERED_REPEATER] = UnpoweredRepeater::class;
			//self::$list[self::POWERED_REPEATER] = PoweredRepeater::class;
			//self::$list[self::STAINED_GLASS] = StainedGlass::class;

			self::$list[self::TRAPDOOR] = Trapdoor::class;
			//self::$list[self::MONSTER_EGG] = MonsterEgg::class;

			self::$list[self::STONE_BRICKS] = StoneBricks::class;
			
			self::$list[self::RED_MUSHROOM_BLOCK] = RedMushroomBlock::class;
			self::$list[self::BROWN_MUSHROOM_BLOCK] = BrownMushroomBlock::class;

			self::$list[self::IRON_BARS] = IronBars::class;
			self::$list[self::GLASS_PANE] = GlassPane::class;
			self::$list[self::MELON_BLOCK] = Melon::class;
			self::$list[self::PUMPKIN_STEM] = PumpkinStem::class;
			self::$list[self::MELON_STEM] = MelonStem::class;
			self::$list[self::VINE] = Vine::class;
			self::$list[self::FENCE_GATE] = FenceGate::class;
			self::$list[self::BRICK_STAIRS] = BrickStairs::class;
			self::$list[self::STONE_BRICK_STAIRS] = StoneBrickStairs::class;

			self::$list[self::MYCELIUM] = Mycelium::class;
			self::$list[self::WATER_LILY] = WaterLily::class;
			self::$list[self::NETHER_BRICKS] = NetherBrick::class;
			self::$list[self::NETHER_BRICK_FENCE] = NetherBrickFence::class;
			self::$list[self::NETHER_BRICKS_STAIRS] = NetherBrickStairs::class;
			self::$list[self::NETHER_WART_BLOCK] = NetherWart::class;

			self::$list[self::ENCHANTING_TABLE] = EnchantingTable::class;
			self::$list[self::BREWING_STAND_BLOCK] = BrewingStand::class;
			//self::$list[self::CAULDRON] = Cauldron::class;
			//self::$list[self::END_PORTAL] = EndPortal::class;

			self::$list[self::END_PORTAL_FRAME] = EndPortalFrame::class;
			self::$list[self::END_STONE] = EndStone::class;
			//self::$list[self::DRAGON_EGG] = DragonEgg::class;
			
			self::$list[self::REDSTONE_LAMP] = RedstoneLamp::class;
			self::$list[self::LIT_REDSTONE_LAMP] = LitRedstoneLamp::class;

		//	self::$list[self::COCOA] = Cocoa::class;
			
			self::$list[self::SANDSTONE_STAIRS] = SandstoneStairs::class;
			self::$list[self::EMERALD_ORE] = EmeraldOre::class;
			
			//self::$list[self::ENDERCHEST] = Enderchest::class;
			
			self::$list[self::TRIPWIRE_HOOK] = TripwireHook::class;
			self::$list[self::TRIPWIRE] = Tripwire::class;

			self::$list[self::EMERALD_BLOCK] = Emerald::class;
			self::$list[self::SPRUCE_WOOD_STAIRS] = SpruceWoodStairs::class;
			self::$list[self::BIRCH_WOOD_STAIRS] = BirchWoodStairs::class;
			self::$list[self::JUNGLE_WOOD_STAIRS] = JungleWoodStairs::class;
			
			//self::$list[self::COMMAND_BLOCK] = CommandBlock::class;
			//self::$list[self::BEACON] = Beacon::class;
			
			self::$list[self::STONE_WALL] = StoneWall::class;

			self::$list[self::FLOWER_POT_BLOCK] = FlowerPot::class;
			self::$list[self::CARROT_BLOCK] = Carrot::class;
			self::$list[self::POTATO_BLOCK] = Potato::class;
			self::$list[self::WOODEN_BUTTON] = WoodenButton::class;
			self::$list[self::SKULL_BLOCK] = SkullBlock::class;
			self::$list[self::ANVIL_BLOCK] = AnvilBlock::class;
			self::$list[self::TRAPPED_CHEST] = TrappedChest::class;
			self::$list[self::LIGHT_WEIGHTED_PRESSURE_PLATE] = LightWeightedPressurePlate::class;
			self::$list[self::HEAVY_WEIGHTED_PRESSURE_PLATE] = HeavyWeightedPressurePlate::class;
			//self::$list[self::UNPOWERED_COMPARATOR] = UnpoweredComparator::class;
			//self::$list[self::POWERED_COMPARATOR] = PoweredComparator::class;
			self::$list[self::DAYLIGHT_DETECTOR] = DaylightDetector::class;

			self::$list[self::REDSTONE_BLOCK] = RedstoneBlock::class;

			self::$list[self::QUARTZ_ORE] = QuartzOre::class;
			//self::$list[self::HOPPER] = Hopper::class;
			self::$list[self::QUARTZ_BLOCK] = Quartz::class;
			self::$list[self::QUARTZ_STAIRS] = QuartzStairs::class;
			self::$list[self::DOUBLE_WOOD_SLAB] = DoubleWoodSlab::class;
			self::$list[self::WOOD_SLAB] = WoodSlab::class;
			self::$list[self::STAINED_CLAY] = StainedClay::class;
			//self::$list[self::STAINED_GLASS_PANE] = StainedGlassPain::class;

			self::$list[self::LEAVES2] = Leaves2::class;
			self::$list[self::WOOD2] = Wood2::class;
			self::$list[self::ACACIA_WOOD_STAIRS] = AcaciaWoodStairs::class;
			self::$list[self::DARK_OAK_WOOD_STAIRS] = DarkOakWoodStairs::class;
			//self::$list[self::SLIMEBLOCK] = Slimeblock::class;
		//	self::$list[self::BARRIER] = Barrier::class;
			self::$list[self::IRON_TRAPDOOR] = IronTrapdoor::class;
			//self::$list[self::PRISMARINE] = Prismarine::class;
			//self::$list[self::SEA_LANTERN] = SeaLantern::class;

			self::$list[self::HAY_BALE] = HayBale::class;
			self::$list[self::CARPET] = Carpet::class;
			self::$list[self::HARDENED_CLAY] = HardenedClay::class;
			self::$list[self::COAL_BLOCK] = Coal::class;
			self::$list[self::PACKED_ICE] = PackedIce::class;

			self::$list[self::DOUBLE_PLANT] = DoublePlant::class;
			//self::$list[self::STANDING_BANNER] = StandingBanner::class;
			//self::$list[self::WALL_BANNER] = WallBanner::class;
			self::$list[self::DAYLIGHT_DETECTOR_INVERTED] = DaylightDetectorInverted::class;
			//self::$list[self::RED_SANDSTONE] = RedSandstone::class;
			//self::$list[self::RED_SANDSTONE_STAIRS] = RedSandstoneStairs::class;
			//self::$list[self::DOUBLE_STONE_SLAB2] = DoubleStoneSlab2::class;
			//self::$list[self::STONE_SLAB2] = StoneSlab2::class;

			self::$list[self::FENCE_GATE_SPRUCE] = FenceGateSpruce::class;
			self::$list[self::FENCE_GATE_BIRCH] = FenceGateBirch::class;
			self::$list[self::FENCE_GATE_JUNGLE] = FenceGateJungle::class;
			self::$list[self::FENCE_GATE_DARK_OAK] = FenceGateDarkOak::class;
			self::$list[self::FENCE_GATE_ACACIA] = FenceGateAcacia::class;
			
			self::$list[self::SPRUCE_DOOR_BLOCK] = SpruceDoor::class;
			self::$list[self::BIRCH_DOOR_BLOCK] = BirchDoor::class;
			self::$list[self::JUNGLE_DOOR_BLOCK] = JungleDoor::class;
			self::$list[self::ACACIA_DOOR_BLOCK] = AcaciaDoor::class;
			self::$list[self::DARK_OAK_DOOR_BLOCK] = DarkOakDoor::class;

			self::$list[self::GRASS_PATH] = GrassPath::class;

			self::$list[self::PODZOL] = Podzol::class;
			self::$list[self::BEETROOT_BLOCK] = Beetroot::class;
			self::$list[self::STONECUTTER] = Stonecutter::class;
			self::$list[self::GLOWING_OBSIDIAN] = GlowingObsidian::class;
			self::$list[self::NETHER_REACTOR] = NetherReactor::class;
		//	self::$list[self::RESERVED] = Reserved::class;

			foreach(self::$list as $id => $class){
				if($class !== null){
					/** @var Block $block */
					$block = new $class();

					for($data = 0; $data < 16; ++$data){
						self::$fullList[($id << 4) | $data] = new $class($data);
					}

					self::$solid[$id] = $block->isSolid();
					self::$transparent[$id] = $block->isTransparent();
					self::$hardness[$id] = $block->getHardness();
					self::$light[$id] = $block->getLightLevel();

					if($block->isSolid()){
						if($block->isTransparent()){
							if($block instanceof Liquid or $block instanceof Ice){
								self::$lightFilter[$id] = 2;
							}else{
								self::$lightFilter[$id] = 1;
							}
						}else{
							self::$lightFilter[$id] = 15;
						}
					}else{
						self::$lightFilter[$id] = 1;
					}
				}else{
					self::$lightFilter[$id] = 1;
					for($data = 0; $data < 16; ++$data){
						self::$fullList[($id << 4) | $data] = new Block($id, $data);
					}
				}
			}
		}
	}

	/**
	 * @param int $id
	 * @param int $meta
	 */
	public function __construct($id, $meta = 0){
		parent::__construct($id,$meta);
	}

	/**
	 * Fires a block update on the Block
	 *
	 * @param int $type
	 *
	 * @return void
	 */
	public function onUpdate($type){
		
	}
}
