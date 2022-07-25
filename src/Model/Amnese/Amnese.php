<?php

namespace BMS\Model\Amnese;

class Amnese
{
    private PersonalData $personalData;
    private Contact $contact;
    private EmergencyContact $emergencyContact;

    public function __construct(PersonalData $personalData, Contact $contact, EmergencyContact $emergencyContact)
    {
        $this->personalData = $personalData;
        $this->contact = $contact;
        $this->emergencyContact = $emergencyContact;
    }

    public function getAmnese()
    {
        return array_merge(
            $this->personalData->getPersonalData(),
            $this->contact->getContact(),
            $this->emergencyContact->getEmergencyContact(),
        );
    }
}
