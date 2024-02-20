<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validierungssprachenzeilen
    |--------------------------------------------------------------------------
    |
    | Die folgenden Sprachzeilen enthalten die von verwendeten Standardfehlermeldungen
    | die Validatorklasse. Für einige dieser Regeln gibt es mehrere Versionen, beispielsweise die
    | Größenregeln. Fühlen Sie sich frei, jede dieser Nachrichten hier zu optimieren.
    |
    */

    'accepted' => 'Das Feld :attribute muss akzeptiert werden.',
    'accepted_if' => 'Das Feld :attribute muss akzeptiert werden, wenn :other den Wert :value hat.',
    'active_url' => 'Das Feld :attribute muss eine gültige URL sein.',
    'after' => 'Das Feld :attribute muss ein Datum nach :date enthalten.',
    'after_or_equal' => 'Das :attribute Feld muss ein Datum nach oder gleich :date sein.',
    'alpha' => 'Das Feld :attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das Feld :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das Feld :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das :attribute Feld muss ein Array sein.',
    'ascii' => 'Das Feld :attribute darf nur alphanumerische Einzelbyte Zeichen und -Symbole enthalten.',
    'before' => 'Das Feld :attribute muss ein Datum vor :date enthalten.',
    'before_or_equal' => 'Das :attribute Feld muss ein Datum vor oder gleich :date sein.',
    'between' => [
        'array' => 'Das :attribute Feld muss Elemente zwischen :min und :max enthalten.',
        'file' => 'Das :attribute Feld muss zwischen :min und :max Kilobyte groß sein.',
        'numeric' => 'Das :attribute Feld muss zwischen :min und :max liegen.',
        'string' => 'Das :attribute Feld muss zwischen :min und :max Zeichen enthalten.',
    ],
    'boolean' => 'Das Feld :attribute muss wahr oder falsch sein.',
    'confirmed' => 'Die Bestätigung des :attribute Feldes stimmt nicht überein.',
    'current_password' => 'Das Passwort ist inkorrekt.',
    'date' => 'Das Feld :attribute muss ein gültiges Datum sein.',
    'date_equals' => 'Das :attribute Feld muss ein Datum sein, das :date entspricht.',
    'date_format' => 'Das Feld :attribute muss dem Format :format entsprechen.',
    'decimal' => 'Das :attribute eld muss :decimal Dezimalstellen enthalten.',
    'declined' => 'Das Feld :attribute muss abgelehnt werden.',
    'declined_if' => 'Das Feld „:attribute“ muss abgelehnt werden, wenn „:other“ den Wert „:value“ hat.',
    'different' => 'Das :attribute Feld und :other müssen unterschiedlich sein.',
    'digits' => 'Das :attribute Feld muss :digits Ziffern enthalten.',
    'digits_between' => 'Das :attribute Feld muss zwischen :min und :max Ziffern enthalten.',
    'dimensions' => 'Das Feld :attribute weist ungültige Bildabmessungen auf.',
    'distinct' => 'Das Feld :attribute hat einen doppelten Wert.',
    'doesnt_end_with' => 'Das :attribute Feld darf nicht mit einem der folgenden Werte enden: :values.',
    'doesnt_start_with' => 'Das :attribute Feld darf nicht mit einem der folgenden Werte beginnen: :values.',
    'email' => 'Das Feld :attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das :attribute Feld muss mit einem der folgenden Werte enden: :values.',
    'enum' => 'Das ausgewählte :Attribut ist ungültig.',
    'exists' => 'Das ausgewählte :Attribut ist ungültig.',
    'file' => 'Das :attribute Feld muss eine Datei sein.',
    'filled' => 'Das Feld :attribute muss einen Wert haben.',
    'gt' => [
        'array' => 'Das :attribute Feld muss mehr als :value Elemente enthalten.',
        'file' => 'Das :attribute Feld muss größer als :value Kilobyte sein.',
        'numeric' => 'Das Feld :attribute muss größer als :value sein.',
        'string' => 'Das :attribute Feld muss mehr als :value Zeichen enthalten.',
    ],
    'gte' => [
        'array' => 'Das :attribute Feld muss :value Elemente oder mehr enthalten.',
        'file' => 'Das :attribute Feld muss größer oder gleich :value Kilobyte sein.',
        'numeric' => 'Das Feld :attribute muss größer oder gleich :value sein.',
        'string' => 'Das :attribute Feld muss größer oder gleich :value Zeichen sein.',
    ],
    'image' => 'Das :attribute Feld muss ein Bild sein.',
    'in' => 'Das ausgewählte :attribut ist ungültig.',
    'in_array' => 'Das :attribute Feld muss in :other vorhanden sein.',
    'integer' => 'Das Feld :attribute muss eine Ganzzahl sein.',
    'ip' => 'Das Feld :attribute muss eine Ganzzahl sein.',
    'ipv4' => 'Das Feld :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das Feld :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das :attribute Feld muss eine gültige JSON Zeichenfolge sein.',
    'lowercase' => 'Das Feld :attribute muss aus Kleinbuchstaben bestehen.',
    'lt' => [
        'array' => 'Das :attribute Feld muss weniger als :value Elemente enthalten.',
        'file' => 'Das :attribute Feld muss kleiner als :value Kilobyte sein.',
        'numeric' => 'Das :attribute Feld muss kleiner als :value sein.',
        'string' => 'Das :attribute Feld muss weniger als :value Zeichen enthalten.',
    ],
    'lte' => [
        'array' => 'Das :attribute Feld darf nicht mehr als :value Elemente enthalten.',
        'file' => 'Das :attribute Feld muss kleiner oder gleich :value Kilobyte sein.',
        'numeric' => 'Das Feld :attribute muss kleiner oder gleich :value sein.',
        'string' => 'Das :attribute Feld muss kleiner oder gleich :value Zeichen sein.',
    ],
    'mac_address' => 'Das Feld :attribute muss eine gültige MAC-Adresse sein.',
    'max' => [
        'array' => 'Das :attribute Feld darf nicht mehr als :max Elemente enthalten',
        'file' => 'Das :attribute Feld darf nicht größer als :max Kilobyte sein.',
        'numeric' => 'Das :attribute Feld darf nicht größer als :max sein.',
        'string' => 'Das :attribute Feld darf nicht länger als :max Zeichen sein.',
    ],
    'max_digits' => 'Das :attribute Feld darf nicht mehr als :max Ziffern enthalten.',
    'mimes' => 'Das :attribute Feld muss eine Datei vom Typ: :values sein.',
    'mimetypes' => 'Das :attribute Feld muss eine Datei vom Typ: :values sein.',
    'min' => [
        'array' => 'Das :attribute Feld muss mindestens :min Elemente enthalten.',
        'file' => 'Das :attribute Feld muss mindestens :min Kilobyte groß sein.',
        'numeric' => 'Das :attribute Feld muss mindestens :min sein.',
        'string' => 'Das :attribute Feld muss mindestens :min Zeichen lang sein.',
    ],
    'min_digits' => 'Das :attribute Feld muss mindestens :min Ziffern enthalten.',
    'missing' => 'Das Feld :attribute muss fehlen.',
    'missing_if' => 'Das Feld :attribute muss fehlen, wenn :other den Wert :value hat.',
    'missing_unless' => 'Das Feld :attribute muss fehlen, es sei denn, :other ist :value.',
    'missing_with' => 'Das Feld :attribute muss fehlen, wenn :values vorhanden ist.',
    'missing_with_all' => 'Das Feld :attribute muss fehlen, wenn :values vorhanden ist.',
    'multiple_of' => 'Das :attribute Feld muss ein Vielfaches von :value sein.',
    'not_in' => 'Das ausgewählte :Attribut ist ungültig.',
    'not_regex' => 'Das :attribute Feldformat ist ungültig.',
    'numeric' => 'Das :attribute Feld muss eine Zahl sein.',
    'password' => [
        'letters' => 'Das Feld :attribute muss mindestens einen Buchstaben enthalten.',
        'mixed' => 'Das Feld :attribute muss mindestens einen Groß- und einen Kleinbuchstaben enthalten.',
        'numbers' => 'Das Feld :attribute muss mindestens eine Zahl enthalten.',
        'symbols' => 'Das Feld :attribute muss mindestens ein Symbol enthalten.',
        'uncompromised' => 'Das angegebene :attribute ist in einem Datenleck aufgetaucht. Bitte wählen Sie ein anderes :attribut.',
    ],
    'present' => 'Das Feld :attribute muss vorhanden sein.',
    'prohibited' => 'Das Feld :attribute ist verboten.',
    'prohibited_if' => 'Das Feld :attribute ist verboten, wenn :other den Wert :value hat.',
    'prohibited_unless' => 'Das Feld :attribute ist verboten, es sei denn, :other ist in :values enthalten.',
    'prohibits' => 'Das :attribute Feld verhindert, dass :other vorhanden ist.',
    'regex' => 'Das :attribute Feldformat ist ungültig.',
    'required' => 'Das Feld :attribute ist erforderlich.',
    'required_array_keys' => 'Das :attribute Feld muss Einträge für: :values enthalten.',
    'required_if' => 'Das Feld :attribute ist erforderlich, wenn :other den Wert :value hat.',
    'required_if_accepted' => 'Das Feld :attribute ist erforderlich, wenn :other akzeptiert wird.',
    'required_unless' => 'Das Feld :attribute ist erforderlich, es sei denn, :other ist in :values enthalten.',
    'required_with' => 'Das Feld :attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all' => 'Das :attribute Feld ist erforderlich, wenn :values vorhanden sind.',
    'required_without' => 'Das Feld :attribute ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => 'Das :attribute Feld ist erforderlich, wenn keiner der :values vorhanden ist.',
    'same' => 'Das :attribute Feld muss mit :other übereinstimmen.',
    'size' => [
        'array' => 'Das :attribute Feld muss :size Elemente enthalten.',
        'file' => 'Das :attribute Feld muss :size Kilobyte sein.',
        'numeric' => 'Das :attribute Feld muss :size sein.',
        'string' => 'Das :attribute Feld muss :size Zeichen enthalten.',
    ],
    'starts_with' => 'Das :attribute Feld muss mit einem der folgenden Werte beginnen: :values.',
    'string' => 'Das :attribute Feld muss eine Zeichenfolge sein.',
    'timezone' => 'Das Feld :attribute muss eine gültige Zeitzone sein.',
    'unique' => 'Das :attribut wurde bereits vergeben.',
    'uploaded' => 'Das :attribute konnte nicht hochgeladen werden.',
    'uppercase' => 'Das Feld :attribute muss in Großbuchstaben geschrieben sein.',
    'url' => 'Das Feld :attribute muss eine gültige URL sein.',
    'ulid' => 'Das :attribute Feld muss eine gültige ULID sein.',
    'uuid' => 'Das :attribute Feld muss eine gültige UUID sein.',

    /*
    |--------------------------------------------------------------------------
    | Benutzerdefinierte Validierungssprachenzeilen
    |--------------------------------------------------------------------------
    |
    | Hier können Sie benutzerdefinierte Validierungsmeldungen für Attribute angeben,
    | indem Sie die Konvention „attribute.rule“ verwenden, um die Zeilen zu benennen.
    | Dies ermöglicht die schnelle Angabe einer bestimmten benutzerdefinierten
    | Sprachzeile für eine bestimmte Attributregel.
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'benutzerdefinierte Nachricht',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Benutzerdefinierte Validierungsattribute
    |--------------------------------------------------------------------------
    |
    | Die folgenden Sprachzeilen werden verwendet, um unseren Attributplatzhalter durch
    | etwas leserfreundlicheres wie „E-Mail-Adresse“ anstelle von „E-Mail“ zu ersetzen.
    | Dies hilft uns einfach, unsere Botschaft ausdrucksvoller zu machen.
    |
    */

    'attributes' => [],

];
