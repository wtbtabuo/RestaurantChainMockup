<?php

namespace RestaurantChain;

use Company\Company;
use Interfaces\FileConvertible;
use RestaurantLocation\RestaurantLocation;

class RestaurantChain extends Company implements FileConvertible{
    private int $chainId;
    private array $restaurantLocations;
    private string $cuisineType;
    private int $numberOfLocations;
    private string $parentCompany;

    public function __construct($name, $foundingYear, $description, $website, $phone, $industry, $ceo, $isPubliclyTraded, $country, $founder, $totalEmployees, $chainId, $restaurantLocations, $cuisineType, $numberOfLocations, $parentCompany) {
        parent::__construct($name, $foundingYear, $description, $website, $phone, $industry, $ceo, $isPubliclyTraded, $country, $founder, $totalEmployees);
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
    }

    public static function RandomGenerator(): self {
        $faker = \Faker\Factory::create();
        $restaurantLocations = [];
        $company = Company::RandomGenerator();
        $parentCompany = $company->getCompanyName();
        for ($i = 0; $i < $faker->numberBetween(1, 5); $i++) {
            $restaurantLocations[] = RestaurantLocation::RandomGenerator();
        }
        return new self(
            $faker->company,
            $faker->year,
            $faker->catchPhrase,
            $faker->url,
            $faker->phoneNumber,
            $faker->word,
            $faker->name,
            $faker->boolean,
            $faker->country,
            $faker->name,
            $faker->numberBetween(50, 10000),
            $faker->randomNumber(),
            $restaurantLocations,
            $faker->word,
            count($restaurantLocations),
            $parentCompany
        );
    }
    
    public function addNewRestaurant(int $chainId, RestaurantLocation $restaurantLocation, bool $cuisineType, int $numberOfLocations): void {
        $this->chainId = $chainId;
        $this->restaurantLocation = $restaurantLocation;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
    }

    public function getAllRestaurantLocation(): array {
        return $this->restaurantLocation;
    }

    public function getCompanyName(): string {
        return $this->parentCompany->getCompanyName();
    }

    public function getCompanyDescription(): string {
        return $this->parentCompany->getCompanyDescription();
    }

    public function getCompanyWebsite(): string {
        return $this->parentCompany->getCompanyWebsite();
    }

    public function getCompanyYear(): int {
        return $this->parentCompany->getCompanyYear();
    }

    public function getCompanyPhone(): int {
        return $this->parentCompany->getCompanyPhone();
    }

    public function getCompanyIndustry(): string {
        return $this->parentCompany->getCompanyIndustry();
    }

    public function getCompanyCeo(): string {
        return $this->parentCompany->getCompanyCeo();
    }

    public function getIsPubliclyTraded(): bool {
        return $this->parentCompany->getIsPubliclyTraded();
    }

    public function toString(): string {
        "Chain ID: $this->chainId, Restaurant Location: $this->restaurantLocation, Cuisine Type: $this->cuisineType, Number of Locations: $this->numberOfLocations, Parent Company: $this->parentCompany";
    }

    public function toHTML(): string {
        return "<h1>Restaurant Chain</h1><p>Chain ID: $this->chainId</p><p>Restaurant Location: $this->restaurantLocation</p><p>Cuisine Type: $this->cuisineType</p><p>Number of Locations: $this->numberOfLocations</p><p>Parent Company: $this->parentCompany</p>";
    }

    public function toMarkdown(): string {
        return "###Chain ID: $this->chainId
                - Restaurant Location: $this->restaurantLocation
                - Cuisine Type: $this->cuisineType
                - Number of Locations: $this->numberOfLocations
                - Parent Company: $this->parentCompany";
    }

    public function toArray(): array {
        return [
            'chainId' => $this->chainId,
            'restaurantLocation' => $this->restaurantLocation,
            'cuisineType' => $this->cuisineType,
            'numberOfLocations' => $this->numberOfLocations,
            'parentCompany' => $this->parentCompany
        ];
    }
}