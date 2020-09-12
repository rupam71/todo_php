       document.addEventListener('DOMContentLoaded', function(){
                    document.querySelector('#login').onclick = function(){
                        var el = document.querySelector('#mid');
                        let div = document.createElement('div');
                        div.id = 'mid';
                        div.innerHTML = '<form action="profile.php" method="POST">'+
                                            '<div class="form-group">'+
                                                '<label">Email address</label>'+
                                                '<input type="email" name="loginEmail" class="form-control" required placeholder="Enter email">'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label">Password</label>'+
                                                '<input type="password" name="loginPassword" class="form-control" required placeholder="Password">'+
                                            '</div>'+       
                                            '<button type="submit" class="btn btn-primary m-2">Submit</button>'+
                                        '</form>'+
                                        '<button onClick="window.location.reload();" class="btn btn-primary m-2">Cancel</button>';
                        el.parentNode.replaceChild(div, el);
                    };

                    document.querySelector('#login2').onclick = function(){
                        var el = document.querySelector('#mid');
                        let div = document.createElement('div');
                        div.id = 'mid';
                        div.innerHTML = '<form action="profile.php" method="POST">'+
                                            '<div class="form-group">'+
                                                '<label">Email address</label>'+
                                                '<input type="email" name="loginEmail" class="form-control" required placeholder="Enter email">'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label">Password</label>'+
                                                '<input type="password" name="loginPassword" class="form-control" required placeholder="Password">'+
                                            '</div>'+       
                                            '<button type="submit" class="btn btn-primary m-2">Submit</button>'+
                                        '</form>'+
                                        '<button onClick="window.location.reload();" class="btn btn-primary m-2">Cancel</button>';
                        el.parentNode.replaceChild(div, el);
                    };

                    document.querySelector('#signup').onclick = function(){
                        var el = document.querySelector('#mid');
                        let div = document.createElement('div');
                        div.id = 'mid';
                        div.innerHTML = '<form action="signup.php" method="POST">'+
                                            '<div class="form-group">'+
                                                '<label">Name</label>'+
                                                '<input type="text" name="name" class="form-control" required placeholder="Enter Name">'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label">Email address</label>'+
                                                '<input type="email" name="email" class="form-control" required placeholder="Enter email">'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label">Password</label>'+
                                                '<input type="password" name="password" class="form-control" required placeholder="Password">'+
                                            '</div>'+ 
                                            '<div class="form-group">'+
                                                '<label">Phone Number</label>'+
                                                '<input type="text" name="phone" class="form-control" required placeholder="Enter Phone Number">'+
                                            '</div>'+      
                                            '<button type="submit" class="btn btn-primary m-2">Submit</button>'+
                                        '</form>'+
                                        '<button onClick="window.location.reload();" class="btn btn-primary m-2">Cancel</button>';
                        el.parentNode.replaceChild(div, el);
                    };

                    document.querySelector('#signup2').onclick = function(){
                        var el = document.querySelector('#mid');
                        let div = document.createElement('div');
                        div.id = 'mid';
                        div.innerHTML = '<form action="signup.php" method="POST">'+
                                            '<div class="form-group">'+
                                                '<label">Name</label>'+
                                                '<input type="text" name="name" class="form-control" required placeholder="Enter Name">'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label">Email address</label>'+
                                                '<input type="email" name="email" class="form-control" required placeholder="Enter email">'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<label">Password</label>'+
                                                '<input type="password" name="password" class="form-control" required placeholder="Password">'+
                                            '</div>'+ 
                                            '<div class="form-group">'+
                                                '<label">Phone Number</label>'+
                                                '<input type="text" name="phone" class="form-control" required placeholder="Enter Phone Number">'+
                                            '</div>'+      
                                            '<button type="submit" class="btn btn-primary m-2">Submit</button>'+
                                        '</form>'+
                                        '<button onClick="window.location.reload();" class="btn btn-primary m-2">Cancel</button>';
                        el.parentNode.replaceChild(div, el);
                    };

                    
                })
 