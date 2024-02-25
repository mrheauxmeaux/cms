<?php

namespace App\Filament\Resources\Hotel;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\CurrencyType;
use App\Models\Achievement;
use Filament\Resources\Resource;
use App\Enums\AchievementCategory;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Traits\TranslatableResource;
use App\Filament\Tables\Columns\HabboBadgeColumn;
use App\Filament\Resources\Hotel\AchievementResource\Pages;

class AchievementResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = Achievement::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Hotel';

    public static string $translateIdentifier = 'achievements';

    protected static ?string $slug = 'hotel/achievements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Main')
                    ->tabs([
                        Tabs\Tab::make(__('filament::resources.tabs.Home'))
                            ->icon('heroicon-o-home')
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('filament::resources.inputs.name'))
                                    ->required()
                                    ->maxLength(64)
                                    ->autocomplete()
                                    ->columnSpan('full'),

                                TextInput::make('level')
                                    ->label(__('filament::resources.inputs.level'))
                                    ->numeric()
                                    ->required()
                                    ->autocomplete()
                                    ->columnSpan('full'),

                                Select::make('category')
                                    ->native(false)
                                    ->label(__('filament::resources.inputs.category'))
                                    ->options(AchievementCategory::toInput())
                            ]),

                        Tabs\Tab::make(__('filament::resources.tabs.Configurations'))
                            ->icon('heroicon-o-cog')
                            ->schema([
                                Select::make('visible')
                                    ->native(false)
                                    ->label(__('filament::resources.inputs.visible'))
                                    ->options([
                                        '1' => __('filament::resources.common.Yes'),
                                        '0' => __('filament::resources.common.No'),
                                    ]),

                                Select::make('reward_type')
                                    ->native(false)
                                    ->label(__('filament::resources.inputs.reward_type'))
                                    ->options(CurrencyType::toInput()),

                                TextInput::make('reward_amount')
                                    ->label(__('filament::resources.inputs.reward_amount'))
                                    ->numeric()
                                    ->required(),

                                TextInput::make('points')
                                    ->label(__('filament::resources.inputs.points'))
                                    ->helperText(__('filament::resources.helpers.achievement_points'))
                                    ->numeric()
                                    ->required(),

                                TextInput::make('progress_needed')
                                    ->label(__('filament::resources.inputs.progress_needed'))
                                    ->helperText(__('filament::resources.helpers.achievement_progress_needed'))
                                    ->numeric()
                                    ->required()
                            ])
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label(__('filament::resources.columns.id')),

                HabboBadgeColumn::make('badge')
                    ->label(__('filament::resources.columns.badge')),

                TextColumn::make('name')
                    ->label(__('filament::resources.columns.name'))
                    ->searchable(),

                TextColumn::make('level')
                    ->label(__('filament::resources.columns.level')),

                TextColumn::make('category')
                    ->badge()
                    ->searchable()
                    ->label(__('filament::resources.columns.category'))
                    ->toggleable(),

                ToggleColumn::make('visible')
                    ->label(__('filament::resources.columns.visible'))
                    ->disabled()
                    ->toggleable()
            ])
            ->filters([
                SelectFilter::make('visible')
                    ->options([
                        '1' => __('filament::resources.common.Yes'),
                        '0' => __('filament::resources.common.No'),
                    ])
                    ->label(__('filament::resources.columns.visible'))
                    ->placeholder(__('filament::resources.common.All')),

                SelectFilter::make('category')
                    ->options(AchievementCategory::toInput())
                    ->label(__('filament::resources.columns.category'))
                    ->placeholder(__('filament::resources.common.All')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAchievements::route('/'),
            'create' => Pages\CreateAchievement::route('/create'),
            'view' => Pages\ViewAchievement::route('/{record}'),
            'edit' => Pages\EditAchievement::route('/{record}/edit'),
        ];
    }
}
