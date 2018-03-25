# Website pages:
This page is viewed when a new user visits the website:
![image](https://user-images.githubusercontent.com/15262648/37873693-91ae0fbc-302a-11e8-992c-0e9e1cb9c2a4.png)

# Register page:
In this page the user register in our website after typing the required information, the user enters his home location on the map and he can drag the marker exactly to his location on the map and the app will pick his location automatically. 
![image](https://user-images.githubusercontent.com/15262648/37873695-95f727b6-302a-11e8-8e83-e4f72ef60892.png)

# Login page:
The login page is used to authenticate the user to his profile after typing the email and password:
![image](https://user-images.githubusercontent.com/15262648/37873696-989c287c-302a-11e8-94fb-d722ddb0e443.png)

# Home page:

This page contains a map that show markers for everyone around the user 
![image](https://user-images.githubusercontent.com/15262648/37873698-9b3a5914-302a-11e8-9463-7ba5ce72f660.png)

The user can click on the marker to view the status of his neighbor:
![image](https://user-images.githubusercontent.com/15262648/37873699-9e3ec12c-302a-11e8-9df3-5a78b84a91ed.png)

Also, he can see the returned and unreturned stuff around him:
Basic information about stuff is viewed as the name of the stuff, owner name, type, and distance. 
 ![image](https://user-images.githubusercontent.com/15262648/37873831-be7a1106-302c-11e8-9f85-f0159b2de55c.png)

![image](https://user-images.githubusercontent.com/15262648/37873859-3daa29b6-302d-11e8-9b20-c430fbe6f5fc.png)

He can also see the skills around him:
![image](https://user-images.githubusercontent.com/15262648/37873833-c664e7c4-302c-11e8-8e10-4e5f449c176c.png)

We view the basic information name, free times.  
![image](https://user-images.githubusercontent.com/15262648/37873834-c990ca26-302c-11e8-8ea3-651a4db93658.png)

Everything is categorized and the user just clicks in the category to view everything inside it:  
![image](https://user-images.githubusercontent.com/15262648/37873835-cd723562-302c-11e8-897e-46d8f614f252.png)

# Categories page:

In this page we view the categories:

### DVDs:
![image](https://user-images.githubusercontent.com/15262648/37873874-85d6837e-302d-11e8-9461-c93a6be3cfea.png)

### Sports:
![image](https://user-images.githubusercontent.com/15262648/37873876-8f87e5de-302d-11e8-9ff7-8796a836ace6.png)

### Books:
![image](https://user-images.githubusercontent.com/15262648/37873879-97aec408-302d-11e8-8432-6880fc615da0.png)


# Add stuff page:
At this page the user can add stuff to his neighbors:
![image](https://user-images.githubusercontent.com/15262648/37873882-a11bf0b0-302d-11e8-8621-0e4c8af3e891.png)

# Add skill page:
At this page the user adds skills to share them with his neighbors: 
![image](https://user-images.githubusercontent.com/15262648/37873885-a7c66864-302d-11e8-891e-1611275cb11c.png)

# Pick needs page:   
At this page the user can tell his neighbors that he wants a stuff:
![image](https://user-images.githubusercontent.com/15262648/37873887-aef550e6-302d-11e8-97ae-61f7257093da.png)

# Request skills page:   
At this page the user can request skills from his neighbors:
![image](https://user-images.githubusercontent.com/15262648/37873889-b7e74952-302d-11e8-8997-41e7b1250f1b.png)

# Profile page: 
At this page, we view all data related to the user, profile info, uploads, notifications and the user can add a profile picture and cover picture.
![image](https://user-images.githubusercontent.com/15262648/37873907-2b469ace-302e-11e8-8311-06533d8ca6d5.png)

# Profile info page:
At this page, we view the profile info and the user can edit his info
![image](https://user-images.githubusercontent.com/15262648/37873909-31a1a896-302e-11e8-9b9f-efabf78f4f07.png)

Here the user can edit his profile and submit changes:
![image](https://user-images.githubusercontent.com/15262648/37873914-391094ac-302e-11e8-8358-4f09df6dedaa.png)

# user uploads page:
At this page, the user can see his uploads and the orders from his neighbors. 
![image](https://user-images.githubusercontent.com/15262648/37873916-413a8f0c-302e-11e8-9afb-328d4bf61f4d.png)

# notifications page:
At this page the user can see his notifications:
A notification is sanded to the user in the following cases:
1-If someone accepted his request.
2-If someone around him requests a skill.
3-If someone around him requests a stuff.

We used real-time notification system using Redis. 
![image](https://user-images.githubusercontent.com/15262648/37873919-47ff0296-302e-11e8-8ac9-f9f8da5ab77f.png)

# user-stuff page:
At this page, the user can update stuff info, approve users to get this stuff.

When the user clicks update this window is appear, so he can update stuff information:




Also, the user can approve his neighbor’s orders:


4.1.1.14 use-neighbors page:
At this page the user can see all his neighbors ordered based in distance:








 	4.1.1.15 users profile page:
At this page, the user can see his neighbor profile page, and they can chat with each other

We implanted a full real-time shat using Redis. 
 

	4.1.1.16 stuff preview page:
At this page, the user can order the stuff, chat with his neighbor, get directed to the stuff location.




At this section, the user can get directed to the stuff location.

















	4.1.1.17 thanks, page:
This page is previewed when the user requests stuff:















4.2 Mobile Application:

4.2.1 Sign in and home pages: 
In the mobile app, the user needs to sign in to access the services that the app provides. When the user enters email and password automatically he will be redirected to home page. By default, home page shows the random stuff and skills around the user. Also, he can choose the categories of stuff and skills around him.

                                                               
   














4.2.2 Add stuff and skill pages: 

 If the user wants to add new stuff or skill.He can go to add a page by side menu. 


The user can choose from the tab (stuff or skill).If the user chooses stuff then he must fill the following fields name, category, type (returned or unreturned stuff), deadline date if it is returned, details f about it and photo which is either from camera or gallery.  

      


















Another tab choice is “skill”, the user on this page must fill the following fields skill’s name, category, free time (days in week and time) and description.

                       
