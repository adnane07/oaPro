<?php $planningId = Cookie::get('planningId');
    $reservation = DB::table('Reservation')->where('planningId', $planningId)->first(); ?>

<h2>  OASIS Garden - SETTAT </h2>	
 	Cher M. {{$reservation->name}} ,<br><br>

Vous avez effectué une reservation le {{$reservation->dateReservation}} à {{$reservation->heureDepart}} et 
nous vous en remercions. Nous vous informons que la confirmation de votre reservation électronique est en pièce
 jointe, que nous vous conseillons d’imprimer afin de conserver toutes les références de votre heure en cas 
 de besoin.
<br><br>

Votre N° de Reservation :{{$reservation->id}}
<br><br>
Pour toute information, veuillez contacter au 0687607407.<br>
Pour toute réclamation, veuillez envoyer votre demande sur notre site.<br><br>

Nous vous remercions de votre confiance et vous souhaitons un bon match.<br>
L'équipe OASIS Garden
