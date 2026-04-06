# One-off: FCFA display + labels (run from project root)
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
VIEWS = ROOT / "resources" / "views"


def fix(content: str) -> str:
    # Remove Bangladesh taka symbol + BDT prefix before Blade echoes
    content = re.sub(r"\u09f3\s*\{\{\s*", "{{ ", content)
    content = re.sub(r"BDT\s*\{\{", "{{", content)

    content = content.replace("Price (৳)", "Prix (FCFA)")
    content = content.replace("Total (BDT)", "Total (FCFA)")
    content = content.replace("/ Month", " / mois")
    content = content.replace("/ month", " / mois")

    # Append FCFA after common price Blade expressions (avoid double)
    price_exprs = [
        r"\{\{\s*\$ht->price\s*\}\}",
        r"\{\{\s*\$ht->discount_price\s*\}\}",
        r"\{\{\s*\$row->price\s*\}\}",
        r"\{\{\s*\$row->discount_price\s*\}\}",
        r"\{\{\s*\$property->price\s*\}\}",
        r"\{\{\s*\$property->discount_price\s*\}\}",
        r"\{\{\s*\$property->service_charge\s*\}\}",
        r"\{\{\s*\$property->amount\s*\}\}",
        r"\{\{\s*number_format\(\$delevery\)\s*\}\}",
        r"\{\{\s*number_format\(\$month\)\s*\}\}",
        r"\{\{\s*number_format\(\$year\)\s*\}\}",
        r"\{\{\s*number_format\(\$property->total_price\)\s*\}\}",
        r"\{\{\$property->price\}\}",
        r"\{\{\$property->discount_price\}\}",
        r"\{\{\$row->price\}\}",
        r"\{\{\$row->discount_price\}\}",
    ]
    for expr in price_exprs:
        content = re.sub(
            "(" + expr + r")(?!\s*FCFA)",
            r"\1 FCFA",
            content,
        )

    content = re.sub(r"FCFA FCFA", "FCFA", content)
    return content


def main():
    for path in VIEWS.rglob("*.blade.php"):
        raw = path.read_text(encoding="utf-8")
        new = fix(raw)
        if new != raw:
            path.write_text(new, encoding="utf-8")
            print("updated", path.relative_to(ROOT))


if __name__ == "__main__":
    main()
