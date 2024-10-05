<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoDuesResource\Pages;
use App\Filament\Resources\NoDuesResource\RelationManagers;
use App\Models\NoDues;
use App\Models\Semester;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoDuesResource extends Resource
{
    protected static ?string $model = NoDues::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('Student')
                    ->relationship('student', 'name')
                    ->required()
                    ->placeholder('Select Student'),

                Select::make('Semester')
                    ->relationship('semester', 'semester_name')
                    ->required()
                    ->placeholder('Select Semester'),

                Select::make('fix_fees_detail_id')
                    ->label('Fees')
                    ->relationship('fees', 'fees')
                    ->required()
                    ->placeholder('Enter Fees'),

                TextInput::make('paying_fees')
                    ->label('Paying Fees')
                    ->required()
                    ->placeholder('Enter Paying Fees'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Student')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('semester.semester_name')
                    ->label('Semester')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('fees.fees')
                    ->label('Fees')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('paying_fees')
                    ->label('Paying Fees')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('balance_fees')
                    ->label('Remaining Fees')
                    ->sortable()
                    ->searchable(),


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
            'index' => Pages\ListNoDues::route('/'),
            'create' => Pages\CreateNoDues::route('/create'),
            'edit' => Pages\EditNoDues::route('/{record}/edit'),
        ];
    }
}
