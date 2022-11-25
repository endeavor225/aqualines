var url = "{{url('charts')}}";
    var objet = {};
    $(document).ready(function(){

        let canvas = document.getElementById('canvas').getContext('2d');
        let dataSet = [] ;
        

        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
            }       

        $.get(url, function(response){

           lstobj = JSON.parse(response);
               
                for(let i=0; i< lstobj.length;i++){
                    let objData = [];
                    let obj = lstobj[i];
                    objData.push(obj.Miniut,obj.Un,obj.Deux,obj.Trois,obj.Quatre,obj.Cinq,obj.Six,obj.Sept,obj.Huit,obj.Neuf,obj.Dix,obj.Onze,obj.Douze,obj.Treize,obj.Quatorze,obj.Quinze,obj.Seize,obj.Dixsept,obj.Dixhuit,obj.Dixneuf,obj.Vingt,obj.Vingtun,obj.Vingtdeux,obj.Vingttrois);
                     dataSet.push({
                        label : lstobj[i].NomGare,
                        lineTension: 0.3,
                        backgroundColor:lstobj[i].Couleurs,
                        borderColor:lstobj[i].Couleur,
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 20,
                        pointBorderWidth: 2,
                        data : objData,
                        borderWith:1,
                        hoverBorderWidth:3,
                        // hoverBorderColor:'#000'
                     })      
                }
                console.log(dataSet);
                let massPopChart =  new Chart(canvas,{
                type: 'line', // bar, horizontalBarm, pie, line, doughnut, radar, polarArea
                data:{
                    labels:['0h','1h','2h','3h','4h','5h','6h','7h','8h','9h','10h','11h','12h','13h','14h','15h','16h','17h','18h','19h','20h','21h','22h','23h'],
                    datasets:dataSet,
                },
                options:{
                    title:{
                        display:false,
                        // text:'Statistique de transfert pour l\'année '+2019 ,
                        fontSize:25
                    },
                    legend:{
                        display:true,
                        position:'right',
                        labels:{
                            fontColor:'#000'
                        }
                    },
                    layout:{
                        padding:{
                            left:50,
                            right:0,
                            bottom:0,
                            top:0
                        }
                    },
                    tooltips:{
                        enable:true
                    }
                }
                });
            });
      });