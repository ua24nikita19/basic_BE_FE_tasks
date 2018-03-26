<?php

class classFlash
{
    //Получаем сообщения для пользователя (из сессии)
    public function getMessage()
    {
        if (classSession::$started == true && $_SESSION['MessageResult']) {
            return classSession::getSession('MessageResult');
        }
        return null;
    }

    //Устанавливаем сообщения для пользователя (в сессию)
    public function setMessage($message): void
    {
        classSession::setSession('MessageResult', $message);
    }
}