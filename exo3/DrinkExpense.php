<?php


class DrinkExpense
{
    /* Remove 'float' type */
    private $amount;

    private $description;

/*  Import the DateTime class and delete the 'DateTime' type */
    private $happenedAt;

/* Import the User class and delete the 'User' type  */

    private $le_payeur;

    /**
     * @var array<User>
     */

     /* delete type 'array'  */
    private $participants;

    /**
     * @param array <string, User> $participants
     */
    public function __construct($amount, $description, DateTime $happenedAt, User $le_payeur, array $participants)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->happenedAt = $happenedAt;
        $this->le_payeur = $le_payeur;
        $this->participants = $participants;
    }


    /**
     * @return array<string, User> $participants
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getHappenedAt(): \DateTime
    {
        return $this->happenedAt;
    }

    public function getPayer(): User
    {
        return $this->le_payeur;
    }

/* Add the 'string' type and rename the method to match the one declared in 'index.php'. */
    function getType(): string 
    {
        return 'DRINK';
    }
/* I add the 'getUnitaryShared()' method to the 'DrinkExpense' class */
    public function getUnitaryShared(): float
    {
        return $this->amount / count($this->participants);
    }
/* I add the 'getUserShare()' method to the 'DrinkExpense' class */
    public function getUserShare(User $user): float
    {
        return $user === $this->le_payeur ? $this->amount - $this->getUnitaryShared() : -$this->getUnitaryShared();
    }
}