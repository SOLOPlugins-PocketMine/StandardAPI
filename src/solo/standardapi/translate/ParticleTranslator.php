<?php

namespace solo\standardapi\translate;

class ParticleTranslator implements Translator{

	public function translate($code){
		return self::$strings[intval($code)] ?? "알 수 없음";
	}

	public static $strings = [
		Particle::TYPE_BUBBLE => "물방울",
		Particle::TYPE_CRITICAL => "크리티컬",
		Particle::TYPE_BLOCK_FORCE_FIELD => "블럭 포스 필드",
		Particle::TYPE_SMOKE => "연기",
		Particle::TYPE_EXPLODE => "폭발",
		Particle::TYPE_EVAPORATION => "수증기",
		Particle::TYPE_FLAME => "불꽃",
		Particle::TYPE_LAVA => "용암",
		Particle::TYPE_LARGE_SMOKE => "커다란 연기",
		Particle::TYPE_REDSTONE => "레드스톤 먼지",
		Particle::TYPE_RISING_RED_DUST => "떠오르는 붉은 먼지",
		Particle::TYPE_ITEM_BREAK => "아이템 파괴",
		Particle::TYPE_SNOWBALL_POOF => "눈조각",
		Particle::TYPE_HUGE_EXPLODE => "큰 폭발",
		Particle::TYPE_HUGE_EXPLODE_SEED => "폭발 연기",
		Particle::TYPE_MOB_FLAME => "몹 불꽃",
		Particle::TYPE_HEART => "하트",
		Particle::TYPE_TERRAIN => "터레인",
		Particle::TYPE_TOWN_AURA => "Town Aura",
		Particle::TYPE_PORTAL => "포탈",
		Particle::TYPE_SPLASH => "스플래시"
	];
}