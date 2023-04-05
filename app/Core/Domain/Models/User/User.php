<?php

namespace App\Core\Domain\Models\User;

use Exception;
use App\Core\Domain\Models\Email;
use App\Exceptions\UserException;
use Illuminate\Support\Facades\Hash;

class User
{
    private UserId $id;
    private string $name;
    private Email $email;
    private string $no_telp;
    private string $hashed_password;
    private bool $is_verified;
    private static bool $verifier = false;

    /**
     * @param UserId $id
     * @param Email $email
     * @param string $no_telp
     * @param string $name
     * @param string $hashed_password
     */
    public function __construct(UserId $id, string $name, Email $email, string $no_telp, string $hashed_password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->no_telp = $no_telp;
        $this->name = $name;
        $this->hashed_password = $hashed_password;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNoTelp(): string
    {
        return $this->no_telp;
    }

    /**
     * @return bool
     */
    public static function isVerifier(): bool
    {
        return self::$verifier;
    }


    public function beginVerification(): self
    {
        self::$verifier = true;
        return $this;
    }

    public function checkPassword(string $password): self
    {
        self::$verifier &= Hash::check($password, $this->hashed_password);
        return $this;
    }

    /**
     * @throws Exception
     */
    public function verify(): void
    {
        if (!self::$verifier) {
            UserException::throw("Username Atau Password Salah", 1003, 401);
        }
    }

    /**
     * @throws Exception
     */
    public static function create(Email $email, string $no_telp, string $name, string $unhashed_password): self
    {
        return new self(
            UserId::generate(),
            $name,
            $email,
            $no_telp,
            Hash::make($unhashed_password)
        );
    }

    /**
    * @throws Exception
    */
    public function changePassword(string $unhashed_password) : void
    {
        $this->hashed_password = Hash::make($unhashed_password);
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function getIsValid(): bool
    {
        return $this->is_verified;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashed_password;
    }

    /**
     * @return void
     */
    public function setIsValid($is_verified): void
    {
        $this->is_verified = $is_verified;
    }
}
