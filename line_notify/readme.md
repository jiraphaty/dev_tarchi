<h1>สคริปต์ แจ้งเตือนไลน์ ผ่าน php by Jiraphat Yuenying</h1>

วิธีทำ

https://youtu.be/ZqHNykXGZjY

สมัคร Token ได้ที่
https://notify-bot.line.me/th/

คำอธิบาย

include "Line_model.php";
เพิ่มไฟล์โมเดลเข้ามาเพื่อเรียกใช้

$line = new Line_Notify();
สร้างวัตถุ ในตัวแปร $line

$line->setToken('ใส่token');
ใช้ตั้ง Token

$line->addMsg('ใส่ข้อความ');
เพิ่มข้อความแบบต่อข้อความได้เรื่อยๆ

$line->setMsg('ใส่ข้อความ');
ใส่ข้อความแบบลบข้อความก่อนหน้า (สามารถใช้ addMsg() ต่อข้อความเพิ่มได้)

$line->setSPId(1);
ใช้ตั้ง Package Sticker

$line->setSId(6);
ใช้ตั้ง Sticker ที่ต้องการส่ง

$line->setImg('https://media.giphy.com/media/13gvXfEVlxQjDO/giphy.gif');
ใช้ตั้ง รูปภาพ ที่ต้องการส่ง

$line->sendNotify();
ใช้ส่งข้อความ จะ return true เมื่อส่งสำเร็จ และ return false เมื่อส่งไม่สำเร็จ

<p>***************************</p>
ฝากกดติดตามช่องยูทูปด้วยครับ
<br>
https://www.youtube.com/c/TARCHII
<p>***************************</p>
มีปัญหา คอมเมนท์ใต้คลิป หรือ เข้ามาสอบถามได้ในกลุ่มเฟสบุ้คเลยนะครับ 
(บางคนอินบ็อกมาแล้วไม่ขึ้น)
<p>***************************</p>
https://www.facebook.com/groups/284652862468386/

ฝากกดติดตามช่องด้วยครับ จะได้ไม่พลาดสคริปต์ใหม่ ๆ
เดี๋ยวหามาแจกเรื่อยๆครับ
<p>***************************</p>
