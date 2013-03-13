title: Project
pages: false
files: true
fields:

  categories:
    label: What type of project is this?
    type: radio
    default: work
    options:
      work: Commercial
      weddings: Wedding
  
  featured:
    label: Featured project
    type: checkbox

  title:
    label: Title
    type: text

  client:
    label: Client
    text: textarea

  videolink:
    label: Project Video Link 
    type: text

  description:
    label: Description
    type: textarea
    size: medium    

  credits:
    label: Credits
    type: textarea
    size: medium
    buttons: 
      - bold
      - italic   

  additionalvideotitle:
    label: Additional Video Title
    type: text

  additionalvideolink: 
    label: Additional Video Link
    type: text