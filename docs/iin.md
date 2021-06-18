# ИИН

Получить инфо:

```php
use ZnKaz\Iin\Domain\Helpers\IinParser;

$iinEntity = IinParser::parse('000000000000');
```

в ответ получим сущность, либо исключение.
