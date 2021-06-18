# ИИН

Получить инфо:

```php
use ZnKaz\Base\Domain\Helpers\IinParser;

$iinEntity = IinParser::parse('000000000000');
```

в ответ получим сущность, либо исключение `\ZnCore\Domain\Exceptions\UnprocessibleEntityException`.
