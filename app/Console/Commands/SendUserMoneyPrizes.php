<?php

namespace App\Console\Commands;

use App\Models\PrizeItem;
use App\Models\UserPrize;
use Illuminate\Console\Command;

class SendUserMoneyPrizes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send-prize-money {count=5}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Пакетная отправка денежных призов на счета пользователей';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $prize = PrizeItem::where('kind', 'money')->limit(1)->first();
        if (!is_null($prize)) {
            $chunks = UserPrize::where('prize_item_id', 1)->where('sent', 0)->get()->chunk($this->argument('count'));
            $num = 0;
            foreach ($chunks as $chunk) {
                foreach ($chunk as $item) {
                    $ids = $item->id . ',';
                    $item->sent = 1;
                    $item->save();
                }
                // !!! Вызов API для отправки денег на счёт, использую $ids или ещё что потребуется !!!
                $num++;
                $this->info('Отправили блок ' . $num);
            }
            return 0;
        } else {
            $this->error('Не нашли запись с типом приза money!');
            return 1;
        }
    }
}
