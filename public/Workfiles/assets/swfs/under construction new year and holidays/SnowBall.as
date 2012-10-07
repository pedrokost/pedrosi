package {
	import flash.display.Sprite;
	//import flash.filters.GlowFilter;

	public class SnowBall extends Sprite {
		public var radius:Number;
		private var color:uint;
		public var vx:Number=0;
		public var vy:Number=0;

		public function SnowBall(radius:Number=40, color:uint=0xFFFFFF) {
			this.radius=radius;
			this.color=color;
			init();
		}
		public function init():void {
			graphics.beginFill(color);
			graphics.drawCircle(0, 0, radius);
			graphics.endFill();
			//trace("you should see me now");

			/* var glow:GlowFilter = new GlowFilter();
			glow.alpha=1;
			glow.blurX=25;
			glow.blurY=25;
			glow.color=color;
			glow.quality=1;
			glow.strength=1;
			
			var filtersArray:Array=new Array(glow);
			
			snow.filters=filtersArray;*/
		}
	}
}