<?php
class RandoManager {

    private ?PDO $db;

    public function  __construct() {
        $this->db = DB::getInstance();
    }

    /**
     * @return array
     */
    public function getRando(): array {
        $randos = [];
        $stmt = $this->db->prepare("SELECT * FROM hiking");
        if($stmt->execute()) {
            foreach($stmt->fetchAll() as $item) {
                //on crée nos objets de type Article
                //$articles[] = new Article($item['id'],$item['title'],$item['content'],$item['date_add']);
                $randos[] = (new Rando($item['id']))
                    ->setName($item['name'])
                    ->setDifficulty($item['difficulty'])
                    ->setDistance($item['distance'])
                    ->setDuration($item['duration'])
                    ->setHeightDifference($item['height_differnce'])
                ;
            }
        }
        return $randos;
    }

    /**
     * @param Rando $rando
     * @return bool
     */
    public function update(Rando $rando): bool {
        if($rando->getId()) {
            $stmt = $this->db->prepare( "
                UPDATE hiking SET
                    name = :name,
                    difficulty = :difficulty,
                    distance = :distance,
                    duration = :duration,
                    height_difference = :height_difference              
                    WHERE id = :id
            ");

            $stmt->bindValue( ':id', $rando->getId());
            $stmt->bindValue( ':name', $rando->getName());
            $stmt->bindValue( ':difficulty', $rando->getDifficulty());
            $stmt->bindValue(':distance', $rando->getDistance());
            $stmt->bindValue(':duration', $rando->getDuration());
            $stmt->bindValue(':height_difference', $rando->getHeightDifference());

            return $stmt->execute();
        }
        return false;
    }

    /**
     * @param Rando $rando
     * @return bool
     */
    public function insert(Rando $rando): bool {
        if(is_null($rando->getId())) {
            $stmt = $this->db->prepare( "
                INSERT INTO hiking(name, difficulty, distance, duration, height_difference) VALUES(:name, :difficulty, :distance, :duration, :height_difference)
                ");

            $stmt->bindValue( ':name', $rando->getName());
            $stmt->bindValue( ':difficulty', $rando->getDifficulty());
            $stmt->bindValue(':distance', $rando->getDistance());
            $stmt->bindValue(':duration', $rando->getDuration());
            $stmt->bindValue(':height_difference', $rando->getHeightDifference());

            return $stmt->execute();
        }
        return false;
    }

    /**
     * @param Rando $rando
     * @return bool
     */
    public function delete(Rando $rando): bool
    {
        if($rando->getId()) {
            $stmt = $this->db->prepare( "
                DELETE FROM hiking WHERE id = :id
            ");
            $stmt->bindValue( ':id', $rando->getId());
            return $stmt->execute();
        }
        return false;
    }

}
