Blog Project
API Documentation

API

    • /register
        ◦ Input
            ▪ name
            ▪ email
            ▪ Usertype
            ▪ password
        ◦ Output
            ▪ 1  // Success
            ▪ Access Denied  //Permission not allowed
    • /login
        ◦ Input
            ▪ email
            ▪ password
            ▪ Usertype
        ◦ Output
            ▪ 1 //Success
            ▪ Access Denied  //Permission not allowed
    • /logout
        ◦ Ouput
            ▪ 1 as Suceess
    • /create_post
        ◦ Input
            ▪ title
            ▪ content
        ◦ Output
            ▪ 1 //Success
            ▪ Access Denied  //Permission not allowed
    • /delete_post
        ◦ Input
            ▪ title
        ◦ Output
            ▪ 1 //Success
            ▪ Access Denied  //Permission not allowed
    • /read_post
        ◦ Output
            ▪ posts 
            ▪ Access Denied  //Permission not allowed
    • /create_comment
        ◦ Input
            ▪ title  //post name
            ▪ body //user comments
        ◦ Output
            ▪ 1 // Success
            ▪ Access Denied  //Permission not allowed
    • /delete_comment
        ◦ Input
            ▪ title //Post Name
            ▪ body //comment msg
        ◦ Ouput
            ▪ 1 as Success
            ▪ comment not exist
            ▪ Access Denied  //Permission not allowed
    • /read_comment
        ◦ Output
            ▪ comments 
    • /read_user
        ◦ Output
            ▪ User 
            ▪ Access Denied  //Permission not allowed
    • /delete_user
        ◦ Input
            ▪ name
            ▪ email
        ◦ Output
            ▪ 1 as Success
            ▪ Access Denied  //Permission not allowed
