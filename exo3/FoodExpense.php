<?php


class FoodExpense
{
    /* Remove the 'float type' */

    private $amount;

    private $description;
/* Import the DateTime class, then delete the 'DateTime' type   */
    private $happenedAt;

    /* Importer la classe User puis supprimer le type  */
    private $le_payeur;

    /**
     * @var array<User>
     */

     /* remove 'array' type   */
    private $participants;

    /**
     * @param array <string, User> $participants
     */
    public function __construct(float $amount, string $description, DateTime $happenedAt, User $le_payeur, array $participants)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->happenedAt = $happenedAt;
        $this->le_payeur = $le_payeur;
        $this->participants = $participants;
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

    /**
     * @return array<string, User> $participants
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    function getType() {
        return 'FOOD';
    }

    public function getUnitaryShared(): float
    {
        return $this->amount / count($this->participants);
    }

    /*Rajouter la fonction 'getUserShare()' qui me permettra de renvoyer la part de l'utilisateur dans la dépense  */
    public function getUserShare(User $user): float
    {
        return $this->getUnitaryShared() * (in_array($user, $this->participants) ? 1 : 0);
    }
    
}