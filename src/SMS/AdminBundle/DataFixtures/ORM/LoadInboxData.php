<?php

namespace SMS\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SMS\AdminBundle\Entity\Inbox;

class LoadInboxData implements FixtureInterface {
	
	public function load(ObjectManager $manager) {
		$mssgOne = new Inbox();
		$mssgOne->setNumber('+31972123456');
		$mssgOne->setSmsdate(new \DateTime('2015-01-01 01:01:01'));
		$mssgOne->setInsertdate(new \DateTime('2015-01-01 01:01:01'));
		$mssgOne->setText('Howdy Inbox!');
		$mssgOne->setPhone(false);
		$mssgOne->setProcessed(false);
		
		$mssgTwo = new Inbox();
		$mssgTwo->setNumber('+31972123457');
		$mssgTwo->setSmsdate(new \DateTime('2015-01-02 12:13:14'));
		$mssgTwo->setInsertdate(new \DateTime('2015-01-02 12:14:14'));
		$mssgTwo->setText('Howdy again!');
		$mssgTwo->setPhone(false);
		$mssgTwo->setProcessed(false);
		
		$mssgThree = new Inbox();
		$mssgThree->setNumber('+31972123458');
		$mssgThree->setSmsdate(new \DateTime('2015-01-01 02:11:12'));
		$mssgThree->setInsertdate(new \DateTime('2015-01-01 02:11:12'));
		$mssgThree->setText('Howdy again!');
		$mssgThree->setPhone(false);
		$mssgThree->setProcessed(false);
		
		$manager->persist($mssgOne);
		$manager->persist($mssgTwo);
		$manager->persist($mssgThree);
		
		$manager->flush();
	}
}