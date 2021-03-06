<?php

namespace hipanel\modules\finance\tests\acceptance\client;

use hipanel\helpers\Url;
use hipanel\tests\_support\Step\Acceptance\Client;

class AccountRechargingCest
{
    public function ensureIndexPageWorks(Client $I)
    {
        $I->login();
        $I->needPage(Url::to('@pay/deposit'));
        $I->see('Account recharging', 'h1');
        $this->ensureICanSeeDepositBox($I);
        $this->ensureICanSeePaymentBox($I);
        $this->ensureICanSeeWarningBox($I);
    }

    private function ensureICanSeeDepositBox(Client $I)
    {
        $url = Url::to('@pay/deposit');
        $form = "//form[@action='$url']";
        $I->see('Amount', "$form/label");
        $I->seeElement('input', ['id' => 'depositform-amount']);
        $text = 'Enter the amount of the replenishment in dollars. For example: 8.79';
        $I->see($text, $form);
        $I->see('Proceed', "$form/button[@type='submit']");
    }

    private function ensureICanSeePaymentBox(Client $I)
    {
        $I->see('Available payment methods', 'h3');
        $I->see('We support fully automatic account depositing with the following payment systems:');
    }

    private function ensureICanSeeWarningBox(Client $I)
    {
        $I->see('Important information', 'h4');
        $text = 'Remember to return to the site after successful payment!';
        $I->see($text, 'p');
    }
}
