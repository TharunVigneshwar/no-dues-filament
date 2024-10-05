<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use App\Models\FixFeesDetail;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FixFeesDetailResource\Pages;
use App\Filament\Resources\FixFeesDetailResource\RelationManagers;

class FixFeesDetailResource extends Resource
{
    protected static ?string $model = FixFeesDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('semester_id')
                    ->relationship('semester', 'semester_name')
                    ->required()
                    ->placeholder('Select Semester'),

               TextInput::make('fees')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('semester.semester_name')
                    ->label('Semester'),

                Tables\Columns\TextColumn::make('fees')
                    ->label('Fees'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListFixFeesDetails::route('/'),
            'create' => Pages\CreateFixFeesDetail::route('/create'),
            'edit' => Pages\EditFixFeesDetail::route('/{record}/edit'),
        ];
    }
}
