<?php
    
    namespace App\Filament\Resources;
    
    use App\Filament\Resources\ProductResource\Pages;
    use App\Filament\Resources\ProductResource\RelationManagers;
    use App\Models\Product;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    
    class ProductResource extends Resource
    {
        protected static ?string $model = Product::class;
        
        protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
        protected static ?string $navigationGroup = 'Productos';
        protected static ?string $modelLabel = 'producto';
        protected static ?string $navigationLabel = 'Productos en venta';
        public Catprod $category;
        
        public static function form(Form $form): Form
        {
            return $form
              ->schema([
                Forms\Components\TextInput::make('name')
                  ->required()
                  ->maxLength(255),
                Forms\Components\Textarea::make('description')
                  ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                  ->numeric()
                  ->prefix('$'),
                Forms\Components\Toggle::make('active')
                  ->required(),
                Forms\Components\Select::make('user_id')
                  ->relationship('user', 'name')
                  ->required(),
              ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
              ->columns([
                Tables\Columns\TextColumn::make('name')
                  ->searchable(),
                Tables\Columns\TextColumn::make('price')
                  ->label('Precio')
                  ->money('EUR', divideBy: 100, locale: 'es')
                  ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                  ->label('Vendedor')
                  ->sortable(),
                Tables\Columns\ToggleColumn::make('oferta'),
                Tables\Columns\ToggleColumn::make('active')
                  ->label('En Venta'),
                Tables\Columns\TextColumn::make('oferta_descuento')
                  ->label('Descuento')
                  ->numeric()
                  ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                  ->numeric()
                  ->sortable(),
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
                //  RelationManagers\CatprodsRelationManager::class,
                //  RelationManagers\UserRelationManager::class,
            ];
        }
        
        public static function getPages(): array
        {
            return [
              'index' => Pages\ListProducts::route('/'),
              'create' => Pages\CreateProduct::route('/create'),
              'edit' => Pages\EditProduct::route('/{record}/edit'),
            ];
        }
    }
