title: Project
pages: false
files: true
fields:

  categories:
    label: Where the project should be displayed
    type: multicheckbox
    default: work
    options:
      work: "Work" page 
      weddings: "Weddings" page
      featured: "Featured" section 

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

  additionalvideotitle:
    label: Additional Video Title
    type: text

  additionalvideolink: 
    label: Additional Video Link
    type: text