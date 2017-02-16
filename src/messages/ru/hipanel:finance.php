<?php
/**
 * Finance module for HiPanel
 *
 * @link      https://github.com/hiqdev/hipanel-module-finance
 * @package   hipanel-module-finance
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

return [
    'Finance' => 'Финансы',
    'Payments' => 'Платежи',
    'Recharge' => 'Пополнить',
    'Recharge Account' => 'Пополнить счет',
    'Recharge account' => 'Пополнить счет',
    'Bill' => 'Платёж',
    'Bills' => 'Платежи',
    'Tariff' => 'Тариф',
    'Tariffs' => 'Тарифы',
    'Servers' => 'Сервера',
    'Requisites' => 'Реквизиты',

    '<b>{currency}</b> account' => '<b>{currency}</b> счёт',
    'See new invoice' => 'Посмотреть новый инвойс',
    'Update invoice' => 'Обновить инвойс',
    'Are you sure you want to update invoice?' => 'Вы уверены что хотите обновить инвойс',
    'Current invoice will be substituted with newer version!' => 'Текущий инвойс будет заменён новой версией!',
    'Confirm invoice updating' => 'Подтвердите обновление инвойса',
    'Invoice' => 'Инвойс',
    'Invoices' => 'Инвойсы',
    'Invoice updated' => 'Инвойс обновлён',
    'Sum' => 'Сумма',
    'Amount' => 'Сумма',
    'Currency' => 'Валюта',
    'Date' => 'Дата',
    'Label' => 'Описание',
    'Create payment' => 'Создать платеж',
    'Use credit funds without depositing' => 'Использовать доступные средства без пополнения',
    'Use credit funds and pay the difference {amount}' => 'Использовать доступные средства и оплатить разницу {amount}',
    'Do not use credit funds, pay the whole cart: {amount}' => 'Не использовать доступные средства, оплатить всю корзину: {amount}',
    'It\'s enough to pay your cart' => 'Этого достаточно для оплаты корзины',
    'Processing your cart...' => 'Обрабатываем корзину...',
    'You balance: {balance} {formattedCredit}' => 'Ваш баланс: {balance} {formattedCredit}',
    '(+{amount} of credit)' => '(+{amount} кредит)',
    'You can pay your cart partially' => 'Вы можете оплатить часть корзины',
    'Your balance after all operations: {amount}' => 'Ваш баланс после выполнения всех операций: {amount}',
    'If you have any further questions, please, {ticketCreationLink}.' => 'Если у вас есть вопросы, пожалуйста, {ticketCreationLink}.',
    'create a ticket' => 'создайте тикет',
    'If you have any further questions, please, contact us {emailLink}' => 'Если у вас есть вопросы, пожалуйста, напишите нам на {emailLink}',
    'Payment system' => 'Платёжная система',
    'TXN' => 'Транзакция',
    'Add payment' => 'Создать платёж',
    '{quantity, plural, one{# minute} other{# minutes}}' => '{quantity, plural, one{# минута} few{# минуты} other{# минут}}',
    '{quantity, time, HH:mm} hour(s)' => '{quantity, time, HH:mm} час(ов)',
    '{quantity} IP' => '{quantity} IP',
    'Held payments' => 'Ожидающие платежи',
    'Provided services' => 'Предоставленные услуги',
    'Set credit' => 'Назначить кредит',
    'Contact' => 'Контакт',
    'Requisite' => 'Реквизит',

    // Типы платежей
    'Negative balance correction' => 'Отрицательная корректировка',
    'Positive balance correction' => 'Корректировка',
    'Registration' => 'Регистрация',
    'Periodic fee' => 'Абонплата',
    'Renewal' => 'Продление',
    'PayPal transaction fee' => 'Комиссия PayPal',
    'Premium renewal' => 'Продление премиум-пакета',
    'Transfer' => 'Трансфер',
    'Premium purchase' => 'Покупка премиум-пакета',
    'Unsale' => 'Распродажа',

    'The entered value for the selected payment type can not be negative.' => 'Для выбранного типа платежа введенное значение не может быть отрицательным числом.',

    'Select payment option' => 'Выберите вариант оплаты',

    'Import' => 'Импортировать',
    'Rows for import' => 'Строки для импорта',
    'Import payments' => 'Импортировать платежи',
    'Update payments' => 'Редактировать платежи',
    'Payment was created successfully' => 'Платёж был создан успешно',
    'Payment was updated successfully' => 'Платёж был успешно отредактирован',
    'Payment was deleted successfully' => 'Платёж был удалён успешно',
    'How to import payments' => 'Как импортирвать платежи',
    '<p>Use the following format: <pre>Client;Time;Amount;Currency;Type;Description</pre>Each payment must be placed on new line.</p>
<p><span class="label label-default">Time</span> can be either: <ul><li><code>this</code> (alias <code>thisMonth</code>) &ndash; first day of this month</li><li><code>prev</code> (alias <code>prevMonth</code>) &ndash; first day of previous month</li><li>date or date with time (for example <code>2016-11-01</code>, <code>01.11.2016 10:20:30</code>)</li></ul></p>
<p><span class="label label-default">Type</span> can be either: <ul><li>a full type notation (<code>deposit,webmoney</code>, <code>deposit,wmdirect</code>)</li><li>short type notation (<code>webmoney</code>, <code>server_traf95_max</code>)</li><li>simply a type name (<code>Partner invoice</code>, <code>WebMoney.Merchant</code>)</li></ul></p>
<p>After the <span class="label label-success">Import</span> button pressing, you will be redirected to the payments creation page to verify and confirm payments.</p>' => '<p>Используйте следующий формат: <pre>Клиент;Время;Сумма;Валюта;Тип;Описание</pre>Каждый платёж должен быть на новой строке.</p>
<p><span class="label label-default">Время</span> может быть: <ul><li><code>this</code> (или <code>thisMonth</code>) &ndash; первый день этого месяца</li><li><code>prev</code> (или <code>prevMonth</code>) &ndash; первый день прошлого месяца</li><li>дата или дата и время (for example <code>2016-11-01</code>, <code>01.11.2016 10:20:30</code>)</li></ul></p>
<p><span class="label label-default">Тип</span> может быть: <ul><li>полный формат (<code>deposit,webmoney</code>, <code>deposit,wmdirect</code>)</li><li>короткий формат (<code>webmoney</code>, <code>server_traf95_max</code>)</li><li>название типа по-английски (<code>Partner invoice</code>, <code>WebMoney.Merchant</code>)</li></ul></p>
<p>После нажатия кнопки <span class="label label-success">Импортировать</span>, вы будете передресованы на страницу создания платежей для проверки и подтверждения импорта.</p>',

    'Balance correction' => 'Коррекция баланса',
    'Coupon' => 'Купон',
    'Coupon discount' => 'Скидочный купон',
    'Deposit' => 'Пополнение',
    'BitPay' => '',
    'Cash' => 'Наличные',
    'Credit card' => 'Кредитная карта',
    'CGPay internal transfer' => 'CGPay внутренний перевод',
    'eCoin' => '',
    'eGold' => '',
    'eP transfer to' => '',
    'ePayments' => '',
    'ePayService' => '',
    'EPSbanking' => '',
    'Fethard' => '',
    'Free Kassa' => '',
    'Interkassa' => '',
    'Moneris' => '',
    'OkPay' => '',
    'Other' => '',
    'Paxum' => '',
    'PayPal' => '',
    'QIWI' => '',
    'RoboKassa' => '',
    '2CheckOut' => '',
    'WebMoney.Merchant' => '',
    'Wire transfer' => 'Электронный перевод',
    'Wirex' => '',
    'WebMoney.Direct' => '',
    'Yandex.Money' => '',
    'Discount' => 'Скидка',
    'Domain services' => 'Доменные услуги',
    'Delete by AGP' => 'Удаление по AGP',
    'Removal' => 'Удаление',
    'Restore deleted' => 'Восстановить удаленные',
    'Restore expired' => 'Восстановление с истекшим сроком действия',
    'Currency exchange' => 'Обмен валют',
    'Feature' => 'Дополнительные возможности',
    'Hardware' => 'Аппаратные средства',
    'Purchase' => 'Покупка',
    'Hardware configuration' => 'Конфигурация аппаратных средств',
    'CPU' => 'ЦПУ',
    'HDD' => 'Жесткий диск',
    'RAM' => 'ОЗУ',
    'Intercept' => 'Перехват',
    'Intercept bid' => 'Ставка за перехват',
    'Cancel intercept' => 'Отмена перехвата',
    'Complete intercept' => 'Завершение перехвата',
    'Intercept fee' => 'Комиссия за перехват',
    'Internal transfer' => 'Внутренний трансфер',
    'Negative internal transfer' => 'Отрицательный внутренний перевод',
    'Positive internal transfer' => 'Позитивный внутренний перевод',
    'Monthly fee' => 'Ежемесячная комиссия',
    'Other payment' => 'Прочие платежи',
    'Other charge' => 'Прочие списания',
    'Push-In' => '',
    'Push-Out' => '',
    'Resource consumption' => 'Потребление ресурсов',
    'Backup disk usage' => 'Потребление диска бэкапами',
    'Backup traffic' => 'Потребление трафика бэкапами',
    'Number of domains' => 'Количество доменов',
    'Number of IPs' => 'Количество IP',
    'Panel ISP5' => 'Панель ISP5',
    'Server traffic OUT' => 'Серверный трафик ИСХ',
    'Server traffic 95% OUT' => 'Серверный трафик 95% ИСХ',
    'Server traffic 95% IN' => 'Серверный трафик 95% ВХО',
    'Server 95 traffic overuse' => 'Серверный трафик 95 перебор',
    'Server traffic IN' => 'Серверный трафик ВХО',
    'Server traffic overuse' => 'Перебор серверного трафика',
    'Support time' => 'Время поддержки',
    'Partnership' => 'Сотрудничество',
    'Partnership program' => 'Партнерская программа',
    'Common' => 'Общий',
    'Discount rule' => 'Скидка правило',
    'Install fee' => 'Плата за установку',
    'Sale fee' => 'Комиссия за продажу',
    'Premium package' => 'Премиум пакет',
    'Refund' => 'Возврат средств',
    'Uninstall' => 'Удаление',
    'Software configuration' => 'Настройка программного обеспечения',
    'ISP' => '',
    'Tax' => 'Налог',
    'GST' => '',
    'PST' => '',
    'Trade' => 'Сделка',
    'Transaction fee' => 'Комиссия за перевод',
    'BitPay transaction fee' => 'BitPay комиссия за перевод',
    'Free-Kassa fee' => 'Free-Kassa комиссия за перевод',
    '2CO transaction fee' => '2CO комиссия за перевод',
    'Confirm document updating' => 'Подтвердите обновление документа',
    'Are you sure you want to update document?' => 'Вы уверены, что хотите обновить документ?',
    'Current document will be substituted with newer version!' => 'Существущий документ будет заменён новым!',
    'Update acceptance report' => 'Обновить акт выполненных работ',
    'See new acceptance report' => 'Просмотреть акт выполненных работ',
];
