<?php

namespace App\Filament\Resources\Orion;

use Filament\Tables;
use Filament\Forms\Form;
use App\Models\CmsSetting;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Traits\TranslatableResource;
use App\Filament\Resources\Orion\CmsSettingResource\Pages;

class CmsSettingResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = CmsSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $slug = 'website/cms-settings';

    public static string $translateIdentifier = 'cms-settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('key')
                            ->label(__('filament::resources.inputs.key'))
                            ->maxLength(50)
                            ->autocomplete()
                            ->unique(ignoreRecord: true)
                            ->required(),

                        TextInput::make('value')
                            ->label(__('filament::resources.inputs.value'))
                            ->required()
                            ->autocomplete(),

                        TextInput::make('comment')
                            ->label(__('filament::resources.inputs.comment'))
                            ->nullable()
                            ->autocomplete()
                            ->columnSpanFull()
                    ])
                    ->columns([
                        'sm' => 2
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('key')
                    ->label(__('filament::resources.columns.key'))
                    ->searchable(),

                TextColumn::make('value')
                    ->label(__('filament::resources.columns.value'))
                    ->searchable()
                    ->limit(30),

                TextColumn::make('comment')
                    ->label(__('filament::resources.columns.comment'))
                    ->toggleable()
                    ->searchable()
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        if (strlen($state) <= $column->getCharacterLimit()) return null;

                        return $state;
                    })
                    ->limit(60)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCmsSettings::route('/'),
        ];
    }
}
