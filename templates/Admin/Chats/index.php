<style>
    .container {
        max-width: 1170px;
        margin: auto;
    }

    img {
        max-width: 100%;
    }

    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%;
        border-right: 1px solid #c4c4c4;
    }

    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }

    .top_spac {
        margin: 20px 0 0;
    }


    .recent_heading {
        float: left;
        width: 40%;
    }

    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
    }

    .headind_srch {
        padding: 10px 29px 10px 20px;
        overflow: hidden;
        border-bottom: 1px solid #c4c4c4;
    }

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }

    .srch_bar input {
        border: 1px solid #cdcdcd;
        border-width: 0 0 1px 0;
        width: 80%;
        padding: 2px 0 4px 6px;
        background: none;
    }

    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }

    .srch_bar .input-group-addon {
        margin: 0 0 0 -27px;
    }

    .chat_ib h5 {
        font-size: 15px;
        color: #464646;
        margin: 0 0 8px 0;
    }

    .chat_ib h5 span {
        font-size: 13px;
        float: right;
    }

    .chat_ib p {
        font-size: 14px;
        color: #989898;
        margin: auto
    }

    .chat_img {
        float: left;
        width: 11%;
    }

    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people {
        overflow: hidden;
        clear: both;
    }

    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }

    .inbox_chat {
        height: 550px;
        overflow-y: scroll;
    }

    .active_chat {
        background: #ebebeb;
    }

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }

    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }

    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }

    .received_withd_msg {
        width: 57%;
    }

    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0;
        color: #fff;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .outgoing_msg {
        overflow: hidden;
        margin: 26px 0 26px;
    }

    .sent_msg {
        float: right;
        width: 46%;
    }

    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {
        border-top: 1px solid #c4c4c4;
        position: relative;
    }

    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }

    .messaging {
        padding: 0 0 50px 0;
    }

    .msg_history {
        height: 516px;
        overflow-y: auto;
    }
</style>


<div class="container-fluid">
    <div class="messaging my-3 h-100">
        <h3 class="my-5 text-start">ระบบแชท</h3>
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="Search">
                            <span class="input-group-addon">
                                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="inbox_chat" id="inbox">
                   
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history" id="msg_history">
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg fixed" id="nameInput" placeholder="Type a message" />
                        <input type="text" class="write_msg fixed" id="messageInput" placeholder="Type a message" />
                        <button class="msg_send_btn" type="button"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
















<script>
    const db = firebase.firestore()
    var changes = []
    // var myDataRef = firebase.database().ref('chat_database');
    db.collection('Chat_database').where('roomId', '==', 1).onSnapshot(snapshot => {
        let changes = snapshot.docChanges();
        changes.forEach(change => {
            renderChat(change.doc)
        })
        $('#newMsg').html(changes.length)
    })

    function renderChat(doc) {

        let roomId = doc.data().roomId
        let userId = doc.data().userId
        let msg = doc.data().msg

        let incoming_msg = ''
        let outgoing_msg = ''


        if (userId == 'nack') {
            incoming_msg += ` <div class="incoming_msg">
                        <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p >${msg}</p>
                                <span class="time_date"> 11:01 AM | June 9</span>
                            </div>
                        </div>
                        </div>
                    </div>`
        } else {

            outgoing_msg += `<div class="outgoing_msg">
                <div class="sent_msg">
                    <p>${msg}</p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>`
        }


        $("#msg_history").append(incoming_msg, outgoing_msg)
        var elem = document.getElementById('msg_history');
        elem.scrollTop = elem.scrollHeight;

    }



    $('#messageInput').keypress(function(e) {
        if (e.keyCode == 13) {
            var name = $('#nameInput').val();
            var text = $('#messageInput').val();
            // myDataRef.push({name: name, text: text});
            db.collection('Chat_database').add({
                roomId: 1,
                userId: name,
                msg: text
            });
            $('#messageInput').val('');

        }
    });


    db.collection('Chat_database').orderBy('userId','asc').onSnapshot(snapshot => {
        let changes = snapshot.docChanges();
        changes.forEach(change => {
            renderUser(change.doc)
        })
        // $('#newMsg').html(changes.length)
    })

    function renderUser(doc) {

        let roomId = doc.data().roomId
        let userId = doc.data().userId
        let msg = doc.data().msg

        let inboxChat = ''

        inboxChat += `  <div class="chat_list active_chat" onclick="selectChat(${roomId})">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>${userId}<span class="chat_date">Dec 25</span></h5>
                                <p>${msg}</p>
                            </div>
                        </div>
                    </div>`
        $("#inbox").append(inboxChat)


    }
</script>