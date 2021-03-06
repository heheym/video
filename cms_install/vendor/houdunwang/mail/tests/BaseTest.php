<?php

namespace tests;

use houdunwang\config\Config;
use houdunwang\mail\Mail;
use PHPUnit\Framework\TestCase;

/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com  www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
class BaseTest extends TestCase
{
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Config::loadFiles('config');
    }

    public function aatestAb()
    {
        $mail = new \PHPMailer();
        $mail->isSMTP(
        );                                      // Set mailer to use SMTP
        $mail->Host
                        = 'smtp.houdunwang.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth
                        = true;                               // Enable SMTP authentication
        $mail->Username = 'dev@houdunwang.com';                 // SMTP username
        $mail->Password
                        = 'Houdunwang999';                           // SMTP password
//        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;

        $mail->setFrom('dev@houdunwang.com', '后盾网');
        $mail->addAddress('2300071698@qq.com', '向军');     // Add a recipient
        $mail->Subject = '这是标题';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody
                       = 'This is the body in plain text for non-HTML mail clients';

        $this->assertTrue($mail->send());
    }

    public function testSend()
    {
        Mail::send(
            '2300071698@qq.com',
            '向军',
            '这是标题',
            '<h1 style="color:#f00;">这是正文abc</h1>
            <img src="tests/images/1.jpg"/>'
        );
    }
}