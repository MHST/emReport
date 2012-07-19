Sổ y bạ điện tử tích [MHST12-05]
==========
`Module emReport - electronic Medical report book`

Tóm tắt ý tưởng
-----------

Sổ y bạ điện tử là ý tưởng xây dựng module có thể giúp bệnh viện, trung tâm y tế, các phòng khám... một cổng thông tin có chức năng cung cấp cho các bệnh nhân một tài khoản để họ có thể quản lý bệnh án thay thế cho việc sử dụng và quản lý sổ y bạ giấy hiện nay vừa lãng phí, vừa không hiệu quả.

Kỹ năng yêu cầu
--------------
+ Ngôn ngữ lập trình: PHP, MySQL, xHTML, CSS…
+ Đánh giá độ khó của ý tưởng: "trung bình" - "tương đối" (tùy chọn của đội thi, xem mô tả chi tiết).
__Ghi chú:___ Độ khó trung bình được giả định với một nhóm khoảng 3 SV thành thạo các kỹ năng yêu cầu chắc chắn sẽ hoàn thành dự án trong 3 tháng, không cần làm toàn thời gian.

Mô tả chi tiết
--------------
+ Module emReport phải có 3 nhiệm vụ: Giúp xây dựng cổng thông tin cho bệnh viện, lưu trữ bệnh án của bệnh nhân như một sổ y bạ trực tuyến, và khả năng kết nối với nhau để tạo thành mạng thông tin quốc gia về cơ sở dữ liệu bệnh án của bệnh nhân, khi đó, dù bệnh nhân có đi khám ở bất cứ bệnh viện nào, bất cứ đâu, thông tin cũng được cập nhật vào sổ y bạ của bệnh nhân. Khả năng kết nối giữa các sổ y bạ khác nhau của một bệnh nhân ở các bệnh viện khác nhau còn cho phép bác sĩ xem xét lịch sử bệnh tật của bệnh nhân một cách đầy đủ. Với emReport, bệnh nhân không sợ mất sổ y bạ, bác sĩ không sợ cho nhầm thuốc khi khám bệnh, kê đơn...
+ Bằng cách thiết lập một website công cộng để mỗi bệnh nhân có thể tự tạo sổ y bạ điện tử và tự cập nhật tình trạng sức khỏe, bệnh tật và các thông tin về sức khỏe của mình (site chủ). Site này còn đóng vai trò tiếp nhận và phân phối thông tin y bạ giữa các website của các bệnh viện, trung tâm y tế... cùng sử dụng module (site khách).
Khi bệnh nhân đi khám bệnh, chỉ cần đưa chứng minh thư và/hoặc khai báo cho bác sĩ biết thông tin của mình. Bác sĩ (là người có tài khoản trên cổng thông tin của cơ sở mình) tùy tình huống sẽ tạo mới hoặc mở sổ y bạ cũ của bệnh nhân (nếu nó đã có trên hệ thống). Quy trình này như sau: Bác sĩ nhập số sổ y bạ của bệnh nhân vào hệ thống cổng thông tin của cơ sở mình:
+ __TH1:__ Không tìm thấy thông tin bệnh nhân trong hệ thống cơ sở hiện tại ==> hệ thống site khách sẽ hỏi lên site chủ, site chủ sẽ kiểm tra cơ sở dữ liệu của mình: 
    + __TH1.1:__ Tìm thấy: site chủ trả về cho site khách. 
    + __TH1.2:__ Không thấy: site chủ hỏi các site cơ sở mà nó có kết nối đến để lấy thông tin về sổ y bạ của bệnh nhân. Nếu vẫn không thấy ==> nó báo về site cơ sở là không thấy. Site cơ sở sẽ tạo sổ y bạ điện tử cho bệnh nhân. 
+ __TH2:__ Tìm thấy thông tin của bệnh nhân trong hệ thống ==> tiếp tục truy vấn lên site khách để tìm và bổ sung các dữ liệu, thực hiện sự đồng bộ, cung cấp thông tin bổ sung cho bác sĩ.

+ Bệnh nhân có thể đăng nhập vào site chủ để chủ động thực hiện việc đồng bộ sở y bạ nếu đi khám ở các nơi khác nhau.

Các chức năng cơ bản (độ khó trung bình):
---------
+ Tạo thông tin bệnh viện, trung tâm y tế, cơ sở khám chữa bệnh.
+ Người quản trị tạo tài khoản và quản lý các bác sĩ.
+ Bác sĩ tạo & quản lý sổ y bạ điện tử cho bệnh nhân.
+ Cho phép bác sĩ ghi thông tin khám bệnh cho bệnh nhân.
+ Nếu hệ thống bật ở chế độ công cộng, cho phép bệnh nhân tự tạo tài khoản cho mình.

Chức năng nâng cao nhằm xử lý việc liên kết site chủ và site khách (độ khó tương đối - không bắt buộc)
-------------
+ Cho phép định nghĩa tên miền site chủ để thực hiện việc kết nối và lấy thông tin.
+ Cho phép khai báo danh sách các cổng thông tin mà nó đồng ý cung cấp dữ liệu bệnh án. (ngoài site chủ, còn có thể cung cấp trực tiếp thông tin cho các site cấp trên hoặc site ngang cấp khác)
+ Viết phương thức xuất - nhập dữ liệu từ các cổng thông tin khác.
+ Cấu hình khác: có hay không việc tiếp nhận thêm dữ liệu từ site chủ; có cung cấp dữ liệu cho site khác hay không, ghi nhận các quá trình kết nối, hệ thống an ninh tự chặn kết nối bất hợp lệ…).

Thông tin khác
-------
Nhờ việc sử dụng nhân NukeViet, tất cả các vấn đề về hệ thống vận hành, an ninh bảo mật… đều đã được NukeViet xử lý. Khối lượng code sẽ chỉ tập trung vào việc code tính năng như ý tưởng đề xuất.

Dù bệnh viện có sử dụng hệ thống hay không, bận nhân vẫn có thể chủ động quản lý thông tin của mình.

Module cung cấp khả năng đăng nhập cho bệnh nhân, nhờ việc hỗ trợ kết nối phân tán của openid có sẵn trong hệ thống NukeViet, bệnh nhân có thể đăng nhập tài khoản của mình tại các website khác nhau của các cơ sở ý tế khác nhau cũng như đăng nhập vào sổ y bạ của mình trên site chủ để đồng bộ dữ liệu khám bệnh từ các trung tâm y tế đã khám...

Mentor & co-mentor
---------
+ Mentor: Bùi Văn Thắng [thangbv@vinades.vn](thangbv@vinades.vn) Công ty cổ phần phát triển nguồn mở Việt Nam.
+ Co-mentor: Nguyễn Thế Hùng [thehung@vinades.vn](thehung@vinades.vn) Công ty cổ phần phát triển nguồn mở Việt Nam.

