package
{
	import flash.display.Sprite;
	
	public class DejaVu_Sans extends Sprite
	{
		[Embed(mimeType="application/x-font", systemFont="DejaVu Sans", fontName="DejaVu Sans",
		unicodeRange="U+0020-U+007E")]
		public static const REGULAR:Class;

		[Embed(mimeType="application/x-font", systemFont="DejaVu Sans", fontName="DejaVu Sans", fontWeight="bold",
		unicodeRange="U+0020-U+007E")]
		public static const BOLD:Class;

		[Embed(mimeType="application/x-font", systemFont="DejaVu Sans", fontName="DejaVu Sans", fontStyle="italic",
		unicodeRange="U+0020-U+007E")]
		public static const ITALIC:Class;

		[Embed(mimeType="application/x-font", systemFont="DejaVu Sans", fontName="DejaVu Sans", fontWeight="bold", fontStyle="italic",
		unicodeRange="U+0020-U+007E")]
		public static const BOLD_ITALIC:Class;
	}
	
}