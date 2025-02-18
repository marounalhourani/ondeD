public function handle()
{
    $preserveTables = ['board_games', 'bg_categories', 'dates', 'events', 'items', 'categories'];

    // Get the list of all tables from sqlite_master
    $tables = DB::select('SELECT name FROM sqlite_master WHERE type = "table"');
    $tables = array_map(fn($table) => $table->name, $tables);

    // Exclude 'sqlite_sequence' from the drop list
    $tables = array_filter($tables, fn($table) => $table !== 'sqlite_sequence');

    // Drop all tables except for the preserved ones
    foreach ($tables as $table) {
        if (!in_array($table, $preserveTables)) {
            $this->info("Dropping table: $table");
            DB::statement("DROP TABLE IF EXISTS $table");
        }
    }

    // Add a special drop statement for sqlite_sequence
    DB::statement("DELETE FROM sqlite_sequence WHERE name NOT IN ('" . implode("', '", $preserveTables) . "')");

    // Run the migrations (fresh)
    $this->info('Running migrate:fresh...');
    Artisan::call('migrate');

    // Run the seeders
    $this->info('Running seeder...');
    Artisan::call('db:seed');
}
