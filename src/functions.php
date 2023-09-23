<?php

/**
 * Get the flash message and return it, if any.
 *
 * @return string with flash message, empty string of no message exists-
 */
function getFlashMessage(): string
{
    $flashMessage = $_SESSION["flash-message"] ?? "";
    unset($_SESSION["flash-message"]);

    return $flashMessage;
}

/**
 * Redirect to an URl.
 *
 * @return void
 */
function redirectTo(string $url): void
{
    header("Location: $url");
    // exit();
}

/**
 * Checks if user is logged in and returns the acronym or redirect to
 * the login page.
 *
 * @return string the user acronym.
 */
function checkIfUserIsLoggedInOrRedirectToLogin(): string
{
    $user = $_SESSION["user"] ?? null;
    if (!$user) {
        $_SESSION["flash-message"] = "You need to login to access to this page.";
        redirectTo("login.php");
        // exit();
    }
    return $user;
}
