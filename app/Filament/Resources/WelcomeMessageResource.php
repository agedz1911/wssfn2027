<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WelcomeMessageResource\Pages;
use App\Filament\Resources\WelcomeMessageResource\RelationManagers;
use App\Models\WelcomeMessage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WelcomeMessageResource extends Resource
{
    protected static ?string $model = WelcomeMessage::class;
    protected static ?string $navigationGroup = 'Front End Page';
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('title'),
                TextInput::make('name2')
                    ->label('Name 2'),
                TextInput::make('title2')
                    ->label('Title 2'),
                TextInput::make('name3')
                    ->label('Name 3'),
                TextInput::make('title3')
                    ->label('Title 3'),
                TextInput::make('no_urut')
                    ->numeric(),
                Toggle::make('is_active')
                    ->inline()
                    ->default(true),
                FileUpload::make('image')
                    ->maxSize(3072)
                    ->downloadable()
                    ->reorderable()
                    ->panelLayout('grid')
                    ->image()
                    ->imageEditor()
                    ->directory('welcomeMessage'),
                FileUpload::make('image2')
                    ->label('Image 2')
                    ->maxSize(3072)
                    ->downloadable()
                    ->reorderable()
                    ->panelLayout('grid')
                    ->image()
                    ->imageEditor()
                    ->directory('welcomeMessage'),
                FileUpload::make('image3')
                    ->label('Image 3')
                    ->maxSize(3072)
                    ->downloadable()
                    ->reorderable()
                    ->panelLayout('grid')
                    ->image()
                    ->imageEditor()
                    ->directory('welcomeMessage'),
                MarkdownEditor::make('description')
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_urut'),
                ImageColumn::make('image'),
                TextColumn::make('name'),
                TextColumn::make('title'),
                ImageColumn::make('image2'),
                TextColumn::make('name2'),
                TextColumn::make('title2'),
                TextColumn::make('description')
                    ->markdown()
                    ->limit(80),
                IconColumn::make('is_active')
                    ->boolean()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListWelcomeMessages::route('/'),
            'create' => Pages\CreateWelcomeMessage::route('/create'),
            'edit' => Pages\EditWelcomeMessage::route('/{record}/edit'),
        ];
    }
}
