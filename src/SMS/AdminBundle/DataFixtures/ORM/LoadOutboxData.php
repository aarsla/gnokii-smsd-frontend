<?php

namespace SMS\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SMS\AdminBundle\Entity\Outbox;

class LoadOutboxData implements FixtureInterface {
	
	public function load(ObjectManager $manager) {
		$mssgOne = new Outbox();
		$mssgOne->setNumber('+31972123456');
		#$mssgOne->setProcessedDate(new \DateTime('2015-01-01 01:01:06'));
		#$mssgOne->setInsertdate(new \DateTime('2015-01-01 01:01:01'));
		$mssgOne->setText('Howdy from Smsd!');
		#$mssgOne->setPhone(false);
		#$mssgOne->setProcessed(false);
		#$mssgOne->setError(false);
		#$mssgOne->setDreport(false);
		$mssgOne->setNotBefore(new \DateTime('00:00:00'));
		$mssgOne->setNotAfter(new \DateTime('23:59:59'));
		
		$mssgTwo = new Outbox();
		$mssgTwo->setNumber('+31972123457');
		$mssgTwo->setText('Howdy from Smsd!');
		
		$mssgThree = new Outbox();
		$mssgThree->setNumber('+31972123458');
		$mssgThree->setText('Unprocessed by Smsd!');
		$mssgThree->setNotBefore(new \DateTime('14:30:00'));
		$mssgThree->setNotAfter(new \DateTime('20:30:30'));
		
		$manager->persist($mssgOne);
		$manager->persist($mssgTwo);
		$manager->persist($mssgThree);
		
		$manager->flush();
	}
}