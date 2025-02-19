<?php
    
    namespace App\Filament\Resources;
    
    use App\Filament\Resources\CategoryResource\Pages;
    use App\Filament\Resources\CategoryResource\RelationManagers;
    use App\Models\Category;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    
    class CategoryResource extends Resource
    {
        protected static ?string $model = Category::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
        
        protected static ?string $navigationGroup = 'Productos';
        protected static ?string $modelLabel = 'Categorías';
        protected static ?int $navigationSort = 1;
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
                Forms\Components\Split::make([
                  Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                  Forms\Components\ColorPicker::make('bgcolor'),
                  Forms\Components\ColorPicker::make('color'),
                  Forms\Components\Toggle::make('icon_active'),
                ])->columnSpanFull(),
                Forms\Components\Split::make([
                  Forms\Components\Textarea::make('image'),
                  Forms\Components\Textarea::make('icon'),
                ])->columnSpanFull(),
              ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
              ->columns([
                Tables\Columns\TextColumn::make('name')
                  ->searchable(),
                Tables\Columns\TextColumn::make('color')
                  ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
              ])
              ->filters([
                  //
              ])
              ->actions([
                Tables\Actions\EditAction::make(),
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
              'index' => Pages\ListCategories::route('/'),
              'create' => Pages\CreateCategory::route('/create'),
              'edit' => Pages\EditCategory::route('/{record}/edit'),
            ];
        }
    }
